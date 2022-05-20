import { domainPath } from "./Config";

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

export default DeleteAPI;