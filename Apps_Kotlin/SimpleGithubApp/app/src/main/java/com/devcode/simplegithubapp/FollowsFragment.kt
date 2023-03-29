package com.devcode.simplegithubapp

import android.content.Intent
import android.os.Bundle
import android.util.Log
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.LinearLayoutManager
import com.devcode.simplegithubapp.databinding.FragmentFollowsBinding
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class FollowsFragment : Fragment() {
    private var __binding: FragmentFollowsBinding? = null
    private val binding get() =  __binding!!
    private val list = ArrayList<UsersResponsesItem>()

    companion object {
        const val ARG_SECTION_NUMBER = "section_number"
        const val ARG_NAME = "app_name"
        private const val TAG = "ViewPagerFollows"
    }

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        __binding = FragmentFollowsBinding.inflate(inflater, container, false)
        return binding.root
    }

    override fun onViewCreated(view: View, savedInstanceState: Bundle?) {
        super.onViewCreated(view, savedInstanceState)
        val index = arguments?.getInt(ARG_SECTION_NUMBER, 0)
        val user = arguments?.getString(ARG_NAME)

        val layoutManager = LinearLayoutManager(requireActivity())
        binding.flowRecyclerView.layoutManager = layoutManager
        binding.flowRecyclerView.setHasFixedSize(true)

        if (index == 1) {
            user?.let {
                val mIndex = 1
                ListDataUsers(it, mIndex)
            }
        } else {
            user?.let {
                val mIndex = 2
                ListDataUsers(it, mIndex)
            }
        }
    }

    private fun ListDataUsers(username: String, index: Int) {
        if(index == 1){
            showLoading(true)
            val client = ApiConfig.getApiService().getUserFollowers(username)
            client.enqueue(object : Callback<ArrayList<UsersResponsesItem>> {
                override fun onResponse(
                    call: Call<ArrayList<UsersResponsesItem>>,
                    response: Response<ArrayList<UsersResponsesItem>>
                ) {
                    showLoading(false)
                    if (response.isSuccessful) {
                        val responseBody = response.body()
                        if (responseBody != null) {
                            /*getListUsers(responseBody)*/
                            list.clear()
                            list.addAll(responseBody)
                            val adapter = ListUsersAdapter(list)
                            binding.flowRecyclerView.adapter = adapter
                            adapter.setOnItemClickCallback(object :
                                ListUsersAdapter.OnItemClickCallback {
                                override fun onItemClicked(data: UsersResponsesItem) {
                                    showSelectedData(data)
                                }
                            })
                        }
                    } else {
                        Log.e(TAG, "onFailure: ${response.message()}")
                    }
                }
                override fun onFailure(call: Call<ArrayList<UsersResponsesItem>>, t: Throwable) {
                    showLoading(true)
                    Log.e(TAG, "OnFailure: ${t.message.toString()}")
                }
            })
        } else {
            showLoading(true)
            val client = ApiConfig.getApiService().getUserFollowing(username)
            client.enqueue(object : Callback<ArrayList<UsersResponsesItem>> {
                override fun onResponse(
                    call: Call<ArrayList<UsersResponsesItem>>,
                    response: Response<ArrayList<UsersResponsesItem>>
                ) {
                    showLoading(false)
                    if (response.isSuccessful) {
                        val responseBody = response.body()
                        if (responseBody != null) {
                            /*getListUsers(responseBody)*/
                            list.addAll(responseBody)
                            val adapter = ListUsersAdapter(list)
                            binding.flowRecyclerView.adapter = adapter
                            adapter.setOnItemClickCallback(object :
                                ListUsersAdapter.OnItemClickCallback {
                                override fun onItemClicked(data: UsersResponsesItem) {
                                    showSelectedData(data)
                                }
                            })
                        }
                    } else {
                        Log.e(TAG, "OnFailure: ${response.message().toString()}")
                    }
                }
                override fun onFailure(call: Call<ArrayList<UsersResponsesItem>>, t: Throwable) {
                    showLoading(true)
                    Log.e(TAG, "OnFailure: ${t.message.toString()}")
                }
            })
        }
    }



    private fun showSelectedData(data: UsersResponsesItem) {
        val intent = Intent(requireActivity(), DetailActivity::class.java)
        intent.putExtra(DetailActivity.EXTRA_STATE, data.login)
        startActivity(intent)
    }

    private fun showLoading(isLoading: Boolean) {
        if (isLoading) {
            binding.flowProgress.visibility = View.VISIBLE
        } else {
            binding.flowProgress.visibility = View.GONE
        }
    }
}