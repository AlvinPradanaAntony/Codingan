const domainPath = "http://localhost:3001";
const GetAPI = (path) => {
  const promise = new Promise((resolve, reject) => {
    fetch(`${domainPath}/${path}`) // alamat URL API yang ingin kita anbil datanya
      .then((response) => response.json()) // ubah response data dari URL API menjadi sebuah data json
      .then(
        (result) => {
          resolve(result);
        },
        (error) => {
          reject(error);
        }
      );
  });
  return promise;
};

const PostAPI = (path, data) => {
  const promise = new Promise((resolve, reject) => {
    fetch(`${domainPath}/${path}`, {
      method: "post", // method POST untuk input/insert data
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data), // kicimkan ke body request untuk data artikel yang akan ditambahkan (insert)
    }).then(
      (result) => {
        resolve(result); // reload / refresh data
      },
      (error) => {
        reject(error);
      }
    );
  });
  return promise;
};

const DeleteAPI = (path, data) => {
  const promise = new Promise((resolve, reject) => {
    fetch(
      `${domainPath}/${path}/${data}`,
      {
        method: "delete",
      }
    ).then(
      (result) => {
        resolve(result);
      },
      (error) => {
        reject(error);
      }
    );
  });
  return promise;
};

const getNewsBlog = () => GetAPI("posts?_sort=id&_order=desc");
const postNewsBlog = (postData) => PostAPI("posts", postData);
const deleteNewsBlog = (deleteData) => DeleteAPI("posts", deleteData);

const API = {
  //Inisialisasi functuion-function yang akan di sediakan global API
  getNewsBlog,
  postNewsBlog,
  deleteNewsBlog,
};

export default API;
