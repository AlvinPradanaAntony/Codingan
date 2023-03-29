package com.devcode.simplegithubapp

import android.os.Bundle
import androidx.fragment.app.Fragment
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.devcode.simplegithubapp.databinding.FragmentBlankBinding

class BlankFragment : Fragment() {
    private var __binding: FragmentBlankBinding? = null
    private val binding get() =  __binding!!

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        __binding = FragmentBlankBinding.inflate(inflater, container, false)
        return binding.root
    }

}