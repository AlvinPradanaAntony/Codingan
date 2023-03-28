package com.devcode.simplegithubapp
import retrofit2.Call
import retrofit2.http.*

interface ApiService {
    @GET("users")
/*    @Headers("Authorization: ${BuildConfig.API_KEY}")*/
    fun getUsers(): Call<ArrayList<ListUsersResponseItem>>


   /* @GET("search/users")
    fun getSearchUser(
        @Query("q") query: String
    ): Call<GithubResponse>

    @GET("users/{username}")
    @Headers("Authorization: token ${BuildConfig.API_KEY}")
    fun getUserDetail(
        @Path("username") username: String
    ): Call<GithubResponse>

    @GET("users/{username}/followers")
    @Headers("Authorization: token ${BuildConfig.API_KEY}")
    fun getFollowers(
        @Path("username") username: String
    ): Call<ArrayList<GithubResponse>>

    @GET("users/{username}/following")
    @Headers("Authorization: token${BuildConfig.API_KEY}")
    fun getFollowing(
        @Path("username") username: String
    ): Call<ArrayList<GithubResponse>>*/
}