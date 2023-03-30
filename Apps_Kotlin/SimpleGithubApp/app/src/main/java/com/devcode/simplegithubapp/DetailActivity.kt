package com.devcode.simplegithubapp

import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.MenuItem
import android.view.View
import androidx.activity.viewModels
import androidx.annotation.StringRes
import androidx.viewpager2.widget.ViewPager2
import com.bumptech.glide.Glide
import com.devcode.simplegithubapp.databinding.ActivityDetailBinding
import com.google.android.material.tabs.TabLayout
import com.google.android.material.tabs.TabLayoutMediator
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class DetailActivity : AppCompatActivity() {
    private lateinit var binding: ActivityDetailBinding
    private val mainViewModel by viewModels<MainViewModel>()

    companion object {
        internal val TAG = DetailActivity::class.java.simpleName
        const val EXTRA_STATE = "extra_state"

        @StringRes
        private val TAB_TITLES = intArrayOf(
            R.string.tab_text_1,
            R.string.tab_text_2
        )
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityDetailBinding.inflate(layoutInflater)
        setContentView(binding.root)


        val name = intent.getStringExtra(EXTRA_STATE)
        supportActionBar?.setDisplayHomeAsUpEnabled(true)
        supportActionBar?.title = name

/*        val sectionsPagerAdapter = SectionsPagerAdapter(this)
        sectionsPagerAdapter.username = name.toString()
        val viewPager: ViewPager2 = binding.viewPager
        viewPager.adapter = sectionsPagerAdapter
        val tabs: TabLayout = binding.tabs
        TabLayoutMediator(tabs, viewPager) { tab, position ->
            tab.text = resources.getString(TAB_TITLES[position])
        }.attach()
        supportActionBar?.elevation = 0f*/
        if (name != null) {
            detailDataUsers(name)
        }
        /*setTabLayoutAdapter(name)*/
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        when (item.itemId) {
            android.R.id.home -> {
                onBackPressed()
                return true
            }
        }
        return super.onOptionsItemSelected(item)
    }



    private fun detailDataUsers(username: String?) {
        mainViewModel.isLoading.observe(this) {
            showLoading(it)
        }
        mainViewModel.getDetailUser(username.toString())
        mainViewModel.detailUsers.observe(this@DetailActivity) { userResponse ->
            if (userResponse != null) {
                setData(userResponse)
                setTabLayoutAdapter(userResponse)
            }
        }
    }
    private fun setData(userResponse: DetailUsersResponses) {
        binding.tvName.text = userResponse.name
        binding.tvBio.text = userResponse.bio
        binding.tvCompany.text = userResponse.company
        binding.tvFollowers.text = userResponse.followers.toString()
        binding.tvFollowing.text = userResponse.following.toString()
        binding.tvLocation.text = userResponse.location
        binding.tvRepo.text = userResponse.public_repos.toString()
        Glide.with(this@DetailActivity)
            .load("${userResponse.avatarUrl}")
            .into(binding.ivAvatar)
    }
    private fun setTabLayoutAdapter(user: DetailUsersResponses) {
        val sectionsPagerAdapter = SectionsPagerAdapter(this)
        sectionsPagerAdapter.username = user.login.toString()
        val viewPager: ViewPager2 = binding.viewPager
        viewPager.adapter = sectionsPagerAdapter
        val tabs: TabLayout = binding.tabs
        TabLayoutMediator(tabs, viewPager) { tab, position ->
            tab.text = resources.getString(TAB_TITLES[position])
        }.attach()
        supportActionBar?.elevation = 0f
    }
    /*    private fun detailDataUsers(username: String?) {
            showLoading(true)
            val client = ApiConfig.getApiService().getDetailUser(username)
            client.enqueue(object : Callback<DetailUsersResponses> {
                override fun onResponse(
                    call: Call<DetailUsersResponses>,
                    response: Response<DetailUsersResponses>
                ) {
                    showLoading(false)
                    if (response.isSuccessful) {
                        val responseBody = response.body()
                        if (responseBody != null) {
                            binding.tvName.text = responseBody.name
                            binding.tvBio.text = responseBody.bio
                            binding.tvCompany.text = responseBody.company
                            binding.tvFollowers.text = responseBody.followers.toString()
                            binding.tvFollowing.text = responseBody.following.toString()
                            binding.tvLocation.text = responseBody.location
                            binding.tvRepo.text = responseBody.public_repos.toString()
                            Glide.with(this@DetailActivity)
                                .load("${responseBody.avatarUrl}")
                                .into(binding.ivAvatar)
                        }
                    } else {
                        Log.e(TAG, "onFailure: ${response.message()}")
                    }
                }

                override fun onFailure(call: Call<DetailUsersResponses>, t: Throwable) {
                    showLoading(true)
                    Log.e(TAG, "onFailure: ${t.message}")
                }
            })
        }*/
    private fun observeLoading() {
        mainViewModel.isLoading.observe(this) {
            showLoading(it)
        }
    }

    private fun showLoading(isLoading: Boolean) {
        if (isLoading) {
            binding.progressBar.visibility = View.VISIBLE
        } else {
            binding.progressBar.visibility = View.GONE
        }
    }
}