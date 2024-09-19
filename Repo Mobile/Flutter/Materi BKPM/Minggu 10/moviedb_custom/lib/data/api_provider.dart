import 'dart:convert';
import 'package:moviedb_custom/model/dataMovies.dart';
import 'package:http/http.dart' show Client, Response;

class ApiProvider {
  String apiKey = '0fc5740199faa752da813c8c97f659e8';
  String baseUrl = 'https://api.themoviedb.org/3';

  Client client = Client();

  Future<Movies> getPopularMovies() async {
    Response response =
        await client.get(Uri.parse('$baseUrl/movie/popular?api_key=$apiKey'));

    if (response.statusCode == 200) {
      return Movies.fromJson(jsonDecode(response.body));
    } else {
      throw Exception(response.statusCode);
    }
  }

    Future<Movies> getNowPlayingMovies() async {
    Response response =
        await client.get(Uri.parse('$baseUrl/movie/now_playing?api_key=$apiKey'));

    if (response.statusCode == 200) {
      return Movies.fromJson(jsonDecode(response.body));
    } else {
      throw Exception(response.statusCode);
    }
  }
  Future<Movies> getUpcomingMovies() async {
    Response response =
        await client.get(Uri.parse('$baseUrl/movie/upcoming?api_key=$apiKey'));

    if (response.statusCode == 200) {
      return Movies.fromJson(jsonDecode(response.body));
    } else {
      throw Exception(response.statusCode);
    }
  }
}
