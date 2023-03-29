package com.devcode.simplegithubapp

import android.os.Build
import android.os.Bundle
import androidx.annotation.RequiresApi
import androidx.appcompat.app.AppCompatActivity
import androidx.fragment.app.Fragment
import androidx.viewpager2.adapter.FragmentStateAdapter

class SectionsPagerAdapter(activity: AppCompatActivity) : FragmentStateAdapter(activity) {
    /*  var model: UsersResponsesItem? = null*/

/*    @RequiresApi(Build.VERSION_CODES.P)
    override fun createFragment(position: Int): Fragment {
        return FollowsFragment.newInstance(position + 1, model)
    }

    override fun getItemCount(): Int {
        return 2
    }*/

/*    override fun createFragment(position: Int): Fragment {
        var fragment: Fragment? = null
        when (position) {
            0 -> fragment = FollowsFragment()
            1 -> fragment = BlankFragment()
        }
        return fragment as Fragment
    }

    override fun getItemCount(): Int {
        return 2
    }*/
    var username: String = ""
    override fun createFragment(position: Int): Fragment {
        val fragment = FollowsFragment()
        fragment.arguments = Bundle().apply {
            putInt(FollowsFragment.ARG_SECTION_NUMBER, position + 1)
            putString(FollowsFragment.ARG_NAME, username)
        }
        return fragment
    }

    override fun getItemCount(): Int {
        return 2
    }
}