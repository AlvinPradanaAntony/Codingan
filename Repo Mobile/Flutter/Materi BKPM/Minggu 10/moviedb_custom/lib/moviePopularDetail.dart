import 'package:cached_network_image/cached_network_image.dart';
import 'package:flutter/material.dart';
import 'package:moviedb_custom/model/dataMovies.dart';

class MovieDetail extends StatelessWidget {
  final Results movie;
  String imgBaseUrl = 'https://image.tmdb.org/t/p/original';
  MovieDetail({required this.movie});
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
          backgroundColor: const Color.fromARGB(255, 10, 21, 49),
          appBar: AppBar(
            title: Text('Movie Detail'),
            centerTitle: true,
            backgroundColor: const Color.fromARGB(255, 10, 21, 49),
          ),
          body: ListView(
            children: [
              Card(
                margin: const EdgeInsets.all(0),
                color: Colors.transparent,
                elevation: 10,
                child: ClipRRect(
                    borderRadius: const BorderRadius.only(
                        bottomLeft: Radius.circular(16),
                        bottomRight: Radius.circular(16)),
                    child: Stack(
                      children: [
                        CachedNetworkImage(
                          imageUrl: '$imgBaseUrl${movie.backdropPath}',
                          height: MediaQuery.of(context).size.height / 3,
                          width: MediaQuery.of(context).size.width,
                          fit: BoxFit.cover,
                          placeholder: (BuildContext context, String url) => SizedBox(
                            width: MediaQuery.of(context).size.width,
                            child: const Center(
                              child: CircularProgressIndicator(),
                            ),
                          ),
                        ),
                        // Container(
                        //   width: MediaQuery.of(context).size.width,
                        //   height: 280,
                        //   child: Image.asset(
                        //     "assets/images/1.jpg",
                        //     fit: BoxFit.cover,
                        //   ),
                        // ),
                        Container(
                          width: MediaQuery.of(context).size.width,
                          height: 280,
                          padding: const EdgeInsets.symmetric(
                              vertical: 10.0, horizontal: 20.0),
                          child: const Center(
                            child: Icon(
                              Icons.play_circle_filled,
                              color: Color.fromARGB(123, 255, 255, 255),
                              size: 50,
                            ),
                          ),
                        ),
                      ],
                    )),
              ),
              const SizedBox(
                height: 40,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 18.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Padding(
                        padding: EdgeInsets.only(bottom: 10),
                        child: Text(movie.title,
                            style: const TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: Colors.white)),
                      ),
                      Text(movie.overview,
                          style: const TextStyle(  
                            fontSize: 14,
                            fontWeight: FontWeight.normal,
                            color: Colors.white,
                          ),
                          textAlign: TextAlign.justify,),
                      const SizedBox(
                        height: 10,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: <Widget>[
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Text(
                                'Release date',
                                style: Theme.of(context)
                                    .textTheme
                                    .caption
                                    ?.copyWith(
                                      fontWeight: FontWeight.bold,
                                      fontSize: 14,
                                      color: Colors.white,
                                    ),
                              ),
                              Text(
                                movie.releaseDate,
                                style: Theme.of(context)
                                    .textTheme
                                    .subtitle2
                                    ?.copyWith(
                                      color: Colors.yellow[800],
                                      fontSize: 12,
                                    ),
                              ),
                            ],
                          ),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Text(
                                'Language',
                                style: Theme.of(context)
                                    .textTheme
                                    .caption
                                    ?.copyWith(
                                      fontWeight: FontWeight.bold,
                                      color: Colors.white,
                                      fontSize: 14,
                                    ),
                              ),
                              Text(
                                movie.originalLanguage,
                                style: Theme.of(context)
                                    .textTheme
                                    .subtitle2
                                    ?.copyWith(
                                      color: Colors.yellow[800],
                                      fontSize: 12,
                                    ),
                              ),
                            ],
                          ),
                          Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: <Widget>[
                              Text(
                                'Rate',
                                style: Theme.of(context)
                                    .textTheme
                                    .caption
                                    ?.copyWith(
                                      fontWeight: FontWeight.bold,
                                      color: Colors.white,
                                      fontSize: 14,
                                    ),
                              ),
                              Text(
                                movie.voteAverage.toString(),
                                style: Theme.of(context)
                                    .textTheme
                                    .subtitle2
                                    ?.copyWith(
                                      color: Colors.yellow[800],
                                      fontSize: 12,
                                    ),
                              ),
                            ],
                          ),
                        ],
                      ),
                    ],
                  )),
              const SizedBox(
                height: 40,
              ),
              Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 18.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const Padding(
                        padding: EdgeInsets.only(bottom: 10),
                        child: Text("Screenshot",
                            style: TextStyle(
                                fontSize: 18,
                                fontWeight: FontWeight.bold,
                                color: Colors.white)),
                      ),
Container(
                              height: 155,
                              child: ListView.separated(
                                separatorBuilder: (context, index) =>
                                    VerticalDivider(
                                  color: Colors.transparent,
                                  width: 5,
                                ),
                                scrollDirection: Axis.horizontal,
                                itemCount: 3,
                                itemBuilder: (context, index) {
                                  // Screenshot image =
                                  //     movieDetail.movieImage.backdrops[index];
                                  return Container(
                                    child: Card(
                                      elevation: 3,
                                      borderOnForeground: true,
                                      shape: RoundedRectangleBorder(
                                        borderRadius: BorderRadius.circular(12),
                                      ),
                                      child: ClipRRect(
                                        borderRadius: BorderRadius.circular(8),
                                        child: CachedNetworkImage(
                                          placeholder: (context, url) => Center(child: CircularProgressIndicator()
                                          ),
                                          imageUrl:
                                              '',
                                          fit: BoxFit.cover,
                                        ),
                                      ),
                                    ),
                                  );
                                },
                              ),
                            ),
                    ],
                  )),
            ],
          )),
    );
  }
}
