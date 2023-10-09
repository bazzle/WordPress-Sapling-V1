import Year from './classes/currentyear.js';
import Init from './classes/Init';

const siteFunctions = {
  documentReady__ready() {
  },
  getyear__ready(){
    const year = new Year();
    year.init();
  }
};

window.functionCore = new Init(siteFunctions);