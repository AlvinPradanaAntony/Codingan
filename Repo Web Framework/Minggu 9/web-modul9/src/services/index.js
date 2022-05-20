const domainPath = "http://localhost:3001/";
const GetAPI = (path) => {
  const promise = new Promise((resolve, reject) => {
    fetch(`${domainPath}/${path}`) // alamat URL API yang ingin kita anbil datanya
      .then((response) => response.json()) // ubah response data dari URL API menjadi sebuah data json
      .then((result) => {
          resolve(result);
        }, (error) => {
          reject(error);
        }
      );
  });
  return promise;
};

const getNewsBlog = () => GetAPI("posts?_sort=id&_order=desc");

const API = { //Inisialisasi functuion-function yang akan di sediakan global API
  getNewsBlog,
};

export default API;
