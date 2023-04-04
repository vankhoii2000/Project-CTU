from flask import Flask, flash, request, render_template, redirect, url_for, jsonify, Response
from keras.models import model_from_json
import os
import flask
from werkzeug.utils import secure_filename
import os
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
import tensorflow as tf
import cv2
import numpy as np
import string
import random
from os.path import join, dirname, realpath
from sklearn.metrics.pairwise import cosine_similarity
from imutils import paths
from flask_cors import CORS
import json
import re

def get_random_string(length):
    letters = string.ascii_lowercase
    result_str = ''.join(random.choice(letters) for i in range(length))
    return result_str

def image_read(img_path):
    img = cv2.imread(img_path)
    img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)
    return img

def center_crop(img, new_width=None, new_height=None):        
    width = img.shape[1]
    height = img.shape[0]
    if width == height:
        new_width = width*0.75
        new_height = height*0.75
        left = int(np.ceil((width - new_width) / 2))
        right = width - int(np.floor((width - new_width) / 2))
        top = int(np.ceil((height - new_height) / 2))
        bottom = height - int(np.floor((height - new_height) / 2))
    else:
      if new_width is None:
          new_width = min(width, height)
      if new_height is None:
          new_height = min(width, height)
      left = int(np.ceil((width - new_width) / 2))
      right = width - int(np.floor((width - new_width) / 2))
      top = int(np.ceil((height - new_height) / 2))
      bottom = height - int(np.floor((height - new_height) / 2))
    if len(img.shape) == 2:
        center_cropped_img = img[top:bottom, left:right]
    else:
        center_cropped_img = img[top:bottom, left:right, ...]

    return center_cropped_img


IMG = 250
def prepare_raw_bytes_for_model(image_path, normalize_for_model=True):
    img = image_read(image_path)
    img = center_crop(img)
    img = cv2.resize(img, (IMG, IMG))
    if normalize_for_model:
        img = img.astype("float32")
        img = tf.keras.applications.inception_v3.preprocess_input(img)
    return img

def numbers_to_strings(argument):
    switcher = {0: 'Cây đa búp đỏ',
                1: 'Cây dương xỉ',
                2: 'Cây huy hoàng',
                3: 'Cây kim tiền',
                4: 'Cây lan ý',
                5: 'Cây lưỡi hổ',
                6: 'Cây mai cảnh',
                7: 'Cây môn quan âm',
                8: 'Cây phát tài mỹ',
                9: 'Cây phú quý',
                10:'Cây trạng nguyên',
                11: 'Cây trầu bà',
                12: 'Cây trường sinh cẩm thạch',
                13: 'Cây trường sinh xanh',
                14: 'Cây vạn lộc',
                15: 'Cúc mâm xôi',
                16: 'Sen đá bắp cải tím',
                17: 'Sen đá cúc tím',
                18: 'Sen đá ruby',
                19: 'Xương rồng bóng vàng'}
    return switcher.get(argument, "Không thuộc cây nào")

def string_to_folder(argument):
    string = {  0: 'caydabupdo',
                1: 'cayduongxi',
                2: 'cayhuyhoang',
                3: 'caykimtien',
                4: 'caylany',
                5: 'cayluoiho',
                6: 'caymaicanh',
                7: 'caymonquanam',
                8: 'cayphattaimy',
                9: 'cayphuquy',
                10: 'caytrangnguyen',
                11: 'caytrauba',
                12: 'caytruongsinhcamthach',
                13: 'caytruongsinhxanh',
                14: 'cayvanloc',
                15: 'cucmamxoi',
                16: 'sendabapcaitim',
                17: 'sendacuctim',
                18: 'sendaruby',
                19: 'xuongrongbongvang'}
    return string.get(argument)


dir_path = "QUAN_LY/upload_image/"
def processing_image(dir_path):
  image_links = list(paths.list_images(dir_path))
  link_images = []
  images = []
  for image_link in image_links:
    split_img_links = image_link.split("/")
    name = split_img_links[-1]
    name = split_string(name)
    link_images.append(name)
    img = prepare_raw_bytes_for_model(image_link)
    images.append(img)
  return link_images, images

def split_string(string):
  string_new = re.split(r'[`!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?~]', string)
  string_new = string_new[1]
  return string_new

def similarity_image(pre_image, dir_image, links_images):
  arr_similarity = []
  pre_image = pre_image.reshape(1, -1)
  for image in dir_image:
    image = image.reshape(1, -1)
    result = cosine_similarity(pre_image, image)
    result = np.squeeze(result, axis = 1)
    arr_similarity.append(result[0])
    my_arr = np.asarray(arr_similarity)

  arrmin = np.argsort(my_arr)
  arrmax = arrmin[::-1][:2]
  link_image = [links_images[idx] for idx in arrmax]
  return link_image

#LOAD MODEL
path_model_json = './MODEL/model.json'
json_file = open(path_model_json, 'r')
loaded_model_json = json_file.read()
json_file.close()
loaded_model = model_from_json(loaded_model_json)
loaded_model.load_weights("./MODEL/model.h5")


def predict_image(image_path):
    img_pro = prepare_raw_bytes_for_model(image_path)
    img_arr = []
    img_arr.append(img_pro)
    img_pro_new = np.stack(img_arr)
    img_pro_new.shape
    img_pre = loaded_model.predict(img_pro_new)
    arrmin = np.argsort(img_pre)[::-1][:1]
    arrmax = arrmin[0][::-1]
    argument = int(arrmax[0])
    
    tencay = numbers_to_strings(argument)
    filename = string_to_folder(argument)
    
    path_dir = os.path.join(dir_path, secure_filename(filename))
    link_images, images = processing_image(path_dir)
    dir = similarity_image(img_pro, images, link_images)
    return tencay, dir



app = Flask(__name__)

CORS(app)

@app.route('/', methods=["GET"])
def home():
	return render_template('./timkiemhinhanh.php')
                
UPLOADS_PATH = join(dirname(realpath(__file__)), './static/uploads')

# @cross_origin()
@app.route("/api/predict", methods=["POST"])
def data_json():
    
    if request.files['my_image'] != '':
        file = request.files['my_image']
        file_name = get_random_string(32) + ".jpg"
        file.save(os.path.join(UPLOADS_PATH, secure_filename(file_name)))
        image_path = os.path.join('./static/uploads', file_name)  
        label, link_image = predict_image(image_path)
        
        
        result = flask.jsonify({'name':label, 'link_image':link_image, 'file_name':file_name})
        return result
    
    
    return jsonify({'name': 'None', 'link_image': 'None', 'file_name':'None'})



if __name__ == "__main__":
    app.run(debug=True)
    
