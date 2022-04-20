import { combineReducers } from "redux";
import todos from "./TodoReducer";
import visibilityFilter from "./FilterReducers";

export default combineReducers({
  todos,
  visibilityFilter,
});
