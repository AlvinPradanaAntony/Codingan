import GetAPI from "./Get";
import PostAPI from "./Post";
import DeleteAPI from "./Delete";

// API - GET
const getNewsBlog = () => GetAPI("posts?_sort=id&_order=desc");

// API - POST
const postNewsBlog = (postData) => PostAPI("posts", postData);

// API - DELETE
const deleteNewsBlog = (deleteData) => DeleteAPI("posts", deleteData);

const API = {
  //Inisialisasi functuion-function yang akan di sediakan global API
  getNewsBlog,
  postNewsBlog,
  deleteNewsBlog,
};

export default API;
