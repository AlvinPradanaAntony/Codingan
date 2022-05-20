import { domainPath } from "./Config";

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

export default PostAPI;