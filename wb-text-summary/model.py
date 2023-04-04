import nltk.data
import sys

from gensim.models import KeyedVectors
from gensim.models import Word2Vec
import pyvi

from pyvi import ViTokenizer
import numpy as np

from sklearn.cluster import KMeans
from sklearn.metrics.pairwise import pairwise_distances_argmin_min

from joblib import dump, load
 
#Hàm đọc dữ liệu
def getData(filePath):
  with open(filePath, encoding='utf-8') as f:
    contents = f.read()
  return contents

def getStop_words(filePath_stopword):
  with open (filePath_stopword, encoding = 'utf-8') as f:
    stop_word = f.read()
  stop_word = stop_word.split('\n')
  return stop_word

#Hàm tiền xử lý dữ liệu
def preProcessing(contents):
  contents = contents.lower()
  contents = contents.replace('\n', '. ')
  contents = contents.strip()
  return contents

def division(contents):
  sentences = nltk.sent_tokenize(contents)
  return sentences

def sentenceVector(sentences, stop_word):
  w2v = KeyedVectors.load_word2vec_format("vi_txt/vi.vec")
  vocab = w2v.wv.vocab
  
  #Khởi tạo list lưu trữ các vector
  X = []
  #Duyệt từng câu trong 1 đoạn
  for sentence in sentences:
    sentence_tokenizer = ViTokenizer.tokenize(sentence)
    words = sentence_tokenizer.split(" ")
    #Khởi tạo vecto 100 chiều
    sentence_vec = np.zeros((100))
    num_word = 0
    for word in words:
      if word in vocab and word not in stop_word:
        num_word += 1
        sentence_vec += w2v.wv[word]
    X.append(sentence_vec / num_word)
  return X

def sentencesCluster(X, length):
  n_clusters = len(X) * length  // 100
  #Phân cụm các câu
  kmeans = KMeans(n_clusters = n_clusters)
  kmeans = kmeans.fit(X)
  return kmeans

#Hàm trả về kết quả đoạn tóm tắt văn bản
def buildSummary(kmeans, X, sentences, length):
  n_clusters = len(X) * length // 100
  avg = []
  for j in range(n_clusters):
    idx = np.where(kmeans.labels_ == j)[0]
    avg.append(np.mean(idx))
  closest, _ = pairwise_distances_argmin_min(kmeans.cluster_centers_, X)
  ordering = sorted(range (n_clusters), key = lambda k: avg[k])
  summary = ' '.join([sentences[closest[idx]] for idx in ordering])
  return summary

def summarizations(contents, length):
  filePath_stopword = 'stopword.txt'
  stop_words = getStop_words(filePath_stopword)
  contents = preProcessing(contents)
  sentences = division(contents)
  X = sentenceVector(sentences, stop_words)
  kmeans = sentencesCluster(X, length)
  summary = buildSummary(kmeans, X, sentences, length)
  return summary