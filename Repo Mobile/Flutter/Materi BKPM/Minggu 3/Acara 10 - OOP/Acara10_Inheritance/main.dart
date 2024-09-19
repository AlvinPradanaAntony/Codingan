import 'armor_titan.dart';
import 'attack_titan.dart';
import 'beast_titan.dart';
import 'human.dart';

void main() {
  ArmorTitan armorTitan = new ArmorTitan();
  AttackTitan attackTitan = new AttackTitan();
  BeastTitan beastTitan = new BeastTitan();
  Human human = new Human();

  armorTitan.powerPoint = 10;
  attackTitan.powerPoint = 5;
  beastTitan.powerPoint = 7;
  human.powerPoint = 6;

  print("Power Point ArmorTitan: ${armorTitan.powerPoint}");
  print("Power Point AttacTitan: ${attackTitan.powerPoint}");
  print("Power Point BeastTitan: ${beastTitan.powerPoint}");
  print("Power Point Human: ${human.powerPoint}");
  print("------------------------------------------------------------");
  printSkill("Armor Titan", armorTitan.terjang());
  printSkill("Attack Titan", attackTitan.punch());
  printSkill("Beast Titan", beastTitan.lempar());
  printSkill("Human", human.killAlltitan());
}

printSkill(type, skill) {
  print("$type mengeluarkan kemampuan: $skill!!!");
}