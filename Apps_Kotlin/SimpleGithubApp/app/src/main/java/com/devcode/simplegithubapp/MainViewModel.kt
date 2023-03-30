package com.devcode.simplegithubapp

import android.util.Log
import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.bumptech.glide.Glide
import kotlinx.coroutines.launch
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainViewModel : ViewModel() {

    private val _listuser = MutableLiveData<ArrayList<UsersResponsesItem>?>()
    val listuser: LiveData<ArrayList<UsersResponsesItem>?> = _listuser

    private val _detailUser = MutableLiveData<DetailUsersResponses?>()
    val detailUsers: LiveData<DetailUsersResponses?> = _detailUser

    private val _searchUser = MutableLiveData<ArrayList<UsersResponsesItem>?>()
    val searchUser: LiveData<ArrayList<UsersResponsesItem>?> = _searchUser

    private val _isLoading = MutableLiveData<Boolean>()
    val isLoading: LiveData<Boolean> = _isLoading

    companion object {
        private const val TAG = "MainViewModel"
    }

    init {
        getListUser()
    }

    fun getUserBySearch(user: String) {
        _isLoading.value = true
        val client = ApiConfig.getApiService().getListUsers(user)
        client.enqueue(object : Callback<GithubResponses> {
            override fun onResponse(
                call: Call<GithubResponses>,
                response: Response<GithubResponses>
            ) {
                if (response.isSuccessful) {
                    _isLoading.value = false
                    val responseBody = response.body()
                    if (responseBody != null) {
                        _searchUser.postValue(responseBody.items)
                    }

                }
            }
            override fun onFailure(call: Call<GithubResponses>, t: Throwable) {
                _isLoading.value = true
                Log.e(TAG, "onFailure: ${t.message.toString()}")
            }
        })
    }

    private fun getListUser() {
        _isLoading.value = true
        val client = ApiConfig.getApiService().getUsers()
        client.enqueue(object : Callback<ArrayList<UsersResponsesItem>> {
            override fun onResponse(
                call: Call<ArrayList<UsersResponsesItem>>,
                response: Response<ArrayList<UsersResponsesItem>>
            ) {
                if (response.isSuccessful) {
                    _isLoading.value = false
                    val responseBody = response.body()
                    if (responseBody != null) {
                        _listuser.postValue(responseBody)
                    }
                }
            }
            override fun onFailure(call: Call<ArrayList<UsersResponsesItem>>, t: Throwable) {
                _isLoading.value = true
                Log.e(TAG, "onFailure: ${t.message.toString()}")
            }
        })
    }

    fun getDetailUser(username: String){
        _isLoading.value = true
        val client = ApiConfig.getApiService().getDetailUser(username)
        client.enqueue(object : Callback<DetailUsersResponses> {
            override fun onResponse(
                call: Call<DetailUsersResponses>,
                response: Response<DetailUsersResponses>
            ) {
                _isLoading.value = false
                if (response.isSuccessful) {
                    val responseBody = response.body()
                    if (responseBody != null) {
                        _detailUser.postValue(responseBody)
                    }
                } else {
                    Log.e(DetailActivity.TAG, "onFailure: ${response.message()}")
                }
            }
            override fun onFailure(call: Call<DetailUsersResponses>, t: Throwable) {
                _isLoading.value = true
                Log.e(DetailActivity.TAG, "onFailure: ${t.message}")
            }
        })
    }
}
