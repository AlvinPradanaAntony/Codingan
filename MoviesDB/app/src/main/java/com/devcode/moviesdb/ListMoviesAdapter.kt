package com.devcode.moviesdb

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.devcode.moviesdb.databinding.ActivityListCardViewBinding

class ListMoviesAdapter(private val listMovie: ArrayList<Movies>) :
    RecyclerView.Adapter<ListMoviesAdapter.ListViewHolders>() {
    private lateinit var onItemClickCallback: OnItemClickCallback
    fun setOnItemClickCallback(onItemClickCallback: OnItemClickCallback) {
        this.onItemClickCallback = onItemClickCallback
    }

    class ListViewHolders(var binding: ActivityListCardViewBinding) : RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ListViewHolders {
        val binding = ActivityListCardViewBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return ListViewHolders(binding)
    }

    override fun getItemCount(): Int = listMovie.size

    override fun onBindViewHolder(holder: ListViewHolders, position: Int) {
        val (name, description, photo, releaseDate) = listMovie[position]
        if (photo != null) {
            holder.binding.picture.setImageResource(photo)
        }
        holder.binding.txtTitle.text = name
        holder.binding.txtDeskripsi.text = description
        holder.binding.txtDate.text = releaseDate
        holder.itemView.setOnClickListener { onItemClickCallback.onItemClicked(listMovie[holder.adapterPosition]) }
//          holder.itemView.setOnClickListener {
//            Toast.makeText(holder.itemView.context, "Kamu memilih " + listHero[holder.adapterPosition].name, Toast.LENGTH_SHORT).show()
//        }
//          holder.itemView.setOnClickListener {
//            val intent = Intent(holder.itemView.context, DetailActivity::class.java)
//            holder.itemView.context.startActivity(intent)
//        }
    }

    interface OnItemClickCallback {
        fun onItemClicked(data: Movies)
    }
}