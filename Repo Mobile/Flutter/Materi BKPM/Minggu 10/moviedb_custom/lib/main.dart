import 'package:cached_network_image/cached_network_image.dart';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:moviedb_custom/data/api_provider.dart';
import 'package:moviedb_custom/model/dataMovies.dart';
import 'package:moviedb_custom/moviePopularDetail.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'MovieDB',
      home: HomePage(),
    );
  }
}

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  ApiProvider apiProvider = ApiProvider();
  Future<Movies>? nowPlayingMovies;
  Future<Movies>? popularMoviesView;
  Future<Movies>? upcomingMoviesView;
  String imgBaseUrl = 'https://image.tmdb.org/t/p/original';

  @override
  void initState() {
    nowPlayingMovies = apiProvider.getNowPlayingMovies();
    popularMoviesView = apiProvider.getPopularMovies();
    upcomingMoviesView = apiProvider.getUpcomingMovies();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    SystemChrome.setSystemUIOverlayStyle(
      const SystemUiOverlayStyle(statusBarColor: Colors.transparent),
    );
    return Scaffold(
      backgroundColor: const Color.fromARGB(255, 10, 21, 49),
      appBar: AppBar(
        toolbarHeight: 80,
        leading: IconButton(
          icon: const Icon(Icons.menu),
          onPressed: () {
            Fluttertoast.showToast(
                msg: "Menu",
                toastLength: Toast.LENGTH_SHORT,
                gravity: ToastGravity.SNACKBAR,
                timeInSecForIosWeb: 1,
                backgroundColor: const Color.fromARGB(255, 76, 185, 158),
                textColor: const Color.fromARGB(255, 10, 21, 49),
                fontSize: 16.0);
          },
        ),
        title: Container(
          width: 200,
          height: 100,
          child: Image.asset('assets/images/logo.png'),
        ),
        centerTitle: true,
        backgroundColor: const Color.fromARGB(255, 10, 21, 49),
        actions: [
          IconButton(
            icon: const Icon(Icons.search),
            onPressed: () {
              Fluttertoast.showToast(
                  msg: "Search",
                  toastLength: Toast.LENGTH_SHORT,
                  gravity: ToastGravity.SNACKBAR,
                  timeInSecForIosWeb: 1,
                  backgroundColor: const Color.fromARGB(255, 76, 185, 158),
                  textColor: const Color.fromARGB(255, 10, 21, 49),
                  fontSize: 16.0);
            },
          ),
        ],
        elevation: 0,
      ),
      body: ListView(
        children: [
          Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                FutureBuilder(
                  future: nowPlayingMovies,
                  builder: (BuildContext context, AsyncSnapshot snapshot) {
                    if (snapshot.hasData) {
                      print("Has Data: ${snapshot.hasData}");
                      List moviesList = snapshot.data.results;
                      return CarouselSlider.builder(
                        itemCount: snapshot.data.results.length,
                        itemBuilder: (BuildContext context, int itemIndex,
                            int pageViewIndex) {
                          Results movies = moviesList[itemIndex];
                          return movieSlider(
                            poster:
                                '$imgBaseUrl${snapshot.data.results[itemIndex].backdropPath}',
                            title: '${snapshot.data.results[itemIndex].title}',
                            onTap: () {
                              Navigator.of(context).push(MaterialPageRoute(
                                  builder: (context) => MovieDetail(
                                        movie: movies,
                                      )));
                            },
                          );
                        },
                        options: CarouselOptions(
                          autoPlay: true,
                          aspectRatio: 1.9,
                          enlargeCenterPage: true,
                          enableInfiniteScroll: true,
                          autoPlayInterval: Duration(seconds: 5),
                          autoPlayAnimationDuration:
                              Duration(milliseconds: 800),
                          pauseAutoPlayOnTouch: true,
                          viewportFraction: 0.8,
                        ),
                      );
                    } else if (snapshot.hasError) {
                      print("Has Error: ${snapshot.hasError}");
                      return const Text('Error!!!');
                    } else {
                      print("Loading...");
                      return Container(
                        margin: const EdgeInsets.only(top: 25),
                        child: const Center(
                          child: CircularProgressIndicator(),
                        ),
                      );
                    }
                  },
                ),
                const SizedBox(
                  height: 28,
                ),
                Padding(
                  padding: const EdgeInsets.only(left: 18),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const Text(
                        "Popular Movies",
                        style: TextStyle(
                            color: Colors.white,
                            fontSize: 16,
                            fontWeight: FontWeight.bold),
                      ),
                      FutureBuilder(
                        future: popularMoviesView,
                        builder:
                            (BuildContext context, AsyncSnapshot snapshot) {
                          if (snapshot.hasData) {
                            print("Has Data: ${snapshot.hasData}");
                            List moviesList = snapshot.data.results;
                            return Container(
                              margin: const EdgeInsets.only(top: 12),
                              height: 220,
                              child: ListView.separated(
                                scrollDirection: Axis.horizontal,
                                itemCount: moviesList.length,
                                separatorBuilder: (context, index) =>
                                    const VerticalDivider(
                                  width: 12,
                                ),
                                itemBuilder:
                                    (BuildContext context, int itemIndex) {
                                  Results movies = moviesList[itemIndex];
                                  return popularMovies(
                                    poster: '$imgBaseUrl${movies.posterPath}',
                                    title: movies.title,
                                    onTap: () {
                                      Navigator.of(context)
                                          .push(MaterialPageRoute(
                                              builder: (context) => MovieDetail(
                                                    movie: movies,
                                                  )));
                                    },
                                  );
                                },
                              ),
                            );
                          } else if (snapshot.hasError) {
                            print("Has Error: ${snapshot.hasError}");
                            return const Text('Error!!!');
                          } else {
                            print("Loading...");
                            return Container(
                              child: const Center(
                                child: CircularProgressIndicator(),
                              ),
                            );
                          }
                        },
                      ),
                    ],
                  ),
                ),
                const SizedBox(
                  height: 28,
                ),
                Padding(
                  padding: const EdgeInsets.only(left: 18),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      const Text(
                        "Upcoming Movies",
                        style: TextStyle(
                            color: Colors.white,
                            fontSize: 16,
                            fontWeight: FontWeight.bold),
                      ),
                      FutureBuilder(
                        future: upcomingMoviesView,
                        builder:
                            (BuildContext context, AsyncSnapshot snapshot) {
                          if (snapshot.hasData) {
                            print("Has Data: ${snapshot.hasData}");
                            List moviesList = snapshot.data.results;
                            return Container(
                              margin: const EdgeInsets.only(top: 12),
                              height: 220,
                              child: ListView.separated(
                                scrollDirection: Axis.horizontal,
                                itemCount: snapshot.data.results.length,
                                separatorBuilder: (context, index) =>
                                    const VerticalDivider(
                                  width: 12,
                                ),
                                itemBuilder:
                                    (BuildContext context, int itemIndex) {
                                  Results movies = moviesList[itemIndex];
                                  return popularMovies(
                                    poster:
                                        '$imgBaseUrl${snapshot.data.results[itemIndex].posterPath}',
                                    title:
                                        '${snapshot.data.results[itemIndex].title}',
                                    onTap: () {
                                      Navigator.of(context)
                                          .push(MaterialPageRoute(
                                              builder: (context) => MovieDetail(
                                                    movie: movies,
                                                  )));
                                    },
                                  );
                                },
                              ),
                            );
                          } else if (snapshot.hasError) {
                            print("Has Error: ${snapshot.hasError}");
                            return const Text('Error!!!');
                          } else {
                            print("Loading...");
                            return Container(
                              child: const Center(
                                child: CircularProgressIndicator(),
                              ),
                            );
                          }
                        },
                      ),
                    ],
                  ),
                ),
                const SizedBox(
                  height: 28,
                ),
              ]),
        ],
      ),
    );
  }
}

class popularMovies extends StatelessWidget {
  final String poster;
  final String title;
  final Function()? onTap;

  popularMovies({required this.poster, required this.title, this.onTap});

  @override
  Widget build(BuildContext context) {
    return Row(
      mainAxisAlignment: MainAxisAlignment.start,
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        InkWell(
          onTap: onTap,
          child: ClipRRect(
            child: CachedNetworkImage(
              imageUrl: poster,
              imageBuilder: (context, imageProvider) {
                return Container(
                  width: 160,
                  height: 250,
                  decoration: BoxDecoration(
                    borderRadius: const BorderRadius.all(
                      Radius.circular(16),
                    ),
                    image: DecorationImage(
                      image: imageProvider,
                      fit: BoxFit.cover,
                    ),
                  ),
                );
              },
              placeholder: (context, url) => Container(
                width: 160,
                height: 250,
                child: const Center(child: CircularProgressIndicator()),
              ),
              errorWidget: (context, url, error) => Container(
                width: 160,
                height: 250,
                decoration: const BoxDecoration(
                  borderRadius: BorderRadius.all(
                    Radius.circular(16),
                  ),
                  image: DecorationImage(
                    image: AssetImage('assets/images/img_not_found.jpg'),
                    fit: BoxFit.cover,
                  ),
                ),
              ),
            ),
          ),
        ),
      ],
    );
  }
}

class movieSlider extends StatelessWidget {
  final String poster;
  final String title;
  final Function()? onTap;

  movieSlider({required this.poster, required this.title, this.onTap});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: const EdgeInsets.only(top: 5),
      child: InkWell(
        onTap: onTap,
        child: ClipRRect(
            borderRadius: const BorderRadius.all(Radius.circular(16.0)),
            child: Stack(
              children: [
                CachedNetworkImage(
                  imageUrl: poster,
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
                Positioned(
                  bottom: 0.0,
                  left: 0.0,
                  right: 0.0,
                  child: Container(
                    decoration: const BoxDecoration(
                      gradient: LinearGradient(
                        colors: [
                          Color.fromARGB(171, 0, 0, 0),
                          Color.fromARGB(0, 0, 0, 0)
                        ],
                        begin: Alignment.bottomCenter,
                        end: Alignment.topCenter,
                      ),
                    ),
                    padding: const EdgeInsets.symmetric(
                        vertical: 10.0, horizontal: 20.0),
                    child: Text(
                      title,
                      style: const TextStyle(
                        color: Colors.white,
                        fontSize: 16.0,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                ),
              ],
            )),
      ),
    );
  }
}
