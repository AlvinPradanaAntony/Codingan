package com.devcode.coba

import android.os.Parcelable
import kotlinx.parcelize.Parcelize

@Parcelize
data class Movies(
    val name: String?,
    val description: String?,
    val photo: Int?,
    val releaseDate: String?,
    val photosampul: Int?
) : Parcelable
