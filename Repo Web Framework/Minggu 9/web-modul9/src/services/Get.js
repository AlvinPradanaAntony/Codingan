import { domainPath } from "./Config";

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

export default GetAPI;