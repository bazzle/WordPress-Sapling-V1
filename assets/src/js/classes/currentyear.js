class Year {

    constructor() {  
      this.yearelem = document.querySelector('.getyear')
      this.currentyear = new Date().getFullYear();
    }
  
    init() {
      this.yearelem.innerHTML = this.currentyear;
    }

}

export default Year