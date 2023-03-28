package com.devcode.simplegithubapp

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.devcode.simplegithubapp.databinding.ItemRowBinding

class RecyclerViewAdapter(private val listUsers: ArrayList<ListUsersResponseItem>) : RecyclerView.Adapter<RecyclerViewAdapter.ViewHolder>() {

    class ViewHolder(var binding: ItemRowBinding) : RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ViewHolder {
        val binding = ItemRowBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return ViewHolder(binding)
    }

    override fun getItemCount() = listUsers.size

    override fun onBindViewHolder(holder: ViewHolder, position: Int) {
        holder.binding.tvName.text = listUsers[position].login
        holder.binding.tvUsername.text = listUsers[position].url
        Glide.with(holder.itemView.context)
            .load(listUsers[position].avatarUrl) // URL Gambar
            .into(holder.binding.profileImage)
    }


}