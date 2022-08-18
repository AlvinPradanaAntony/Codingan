// Super Class
class Holiday{
  constructor(destination, days){
    this.destination = destination;
    this.days = days;
  }

  info(){
    alert(`${this.destination} will take ${this.days} days.`);
  }
}

// Sub class
class Expedition extends Holiday{
  constructor(destination, days, gear){
    super(destination, days);
    this.gear = gear;
  }

  info(){
    super.info();
    alert(`Bring your gear to ${this.gear.join(' and your ')}`);
  }
}

// Main
const tripWithGear = new Expedition('Semeru', 10, ['Sunglass', 'Flags', 'Camera']);
tripWithGear.info();