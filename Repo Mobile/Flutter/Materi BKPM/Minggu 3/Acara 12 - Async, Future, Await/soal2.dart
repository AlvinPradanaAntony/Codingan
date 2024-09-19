void main(List<String> args) {
  print('Life');
  delayPrint(500, 'Never Flat');
  print('Is');
}

Future delayPrint(int ms, String message) {
  final duration = Duration(milliseconds: ms);
  return Future.delayed(duration).then((value) => print(message));
}