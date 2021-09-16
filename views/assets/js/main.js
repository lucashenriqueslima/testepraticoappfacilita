Vue.component("modal", {
  template: "#modal-template"
});

var app = new Vue({
  el: '#main',
  data: {
    inMove: false,
    activeSection: 0,
    offsets: [],
    touchStartY: 0,
    showModal: false,
    book: "",
    type: "",
    time: 3
  },
  methods: {
    setModal() {

      setTimeout(() => {
        if (this.book == "" || this.type == "") {
          alert("Favor preencha todos os campos");
          return
        }
        if (this.type == "Professor") {
          this.time = 10
        }
        this.showModal = true;

      }, 1000);

    },

    calculateSectionOffsets() {
      let sections = document.getElementsByTagName('section');
      let length = sections.length;

      for (let i = 0; i < length; i++) {
        let sectionOffset = sections[i].offsetTop;
        this.offsets.push(sectionOffset);
      }
    },
    handleMouseWheel: function (e) {

      if (e.wheelDelta < 30 && !this.inMove) {
        this.moveUp();
      } else if (e.wheelDelta > 30 && !this.inMove) {
        this.moveDown();
      }

      e.preventDefault();
      return false;
    },
    handleMouseWheelDOM: function (e) {

      if (e.detail > 0 && !this.inMove) {
        this.moveUp();
      } else if (e.detail < 0 && !this.inMove) {
        this.moveDown();
      }

      return false;
    },
    moveDown() {
      this.inMove = true;
      this.activeSection--;

      if (this.activeSection < 0) this.activeSection = this.offsets.length - 1;

      this.scrollToSection(this.activeSection, true);
    },
    moveUp() {
      this.inMove = true;
      this.activeSection++;

      if (this.activeSection > this.offsets.length - 1) this.activeSection = 0;

      this.scrollToSection(this.activeSection, true);
    },
    scrollToSection(id, force = false) {
      if (this.inMove && !force) return false;

      this.activeSection = id;
      this.inMove = true;

      document.getElementsByTagName('section')[id].scrollIntoView({
        behavior: 'smooth'
      });

      setTimeout(() => {
        this.inMove = false;
      }, 400);

    },
    touchStart(e) {
      e.preventDefault();

      this.touchStartY = e.touches[0].clientY;
    },
    touchMove(e) {
      if (this.inMove) return false;
      e.preventDefault();

      const currentY = e.touches[0].clientY;

      if (this.touchStartY < currentY) {
        this.moveDown();
      } else {
        this.moveUp();
      }

      this.touchStartY = 0;
      return false;
    }
  },
  created() {
    this.calculateSectionOffsets();

    window.addEventListener('DOMMouseScroll', this.handleMouseWheelDOM);
    window.addEventListener('mousewheel', this.handleMouseWheel, {
      passive: false
    });

    window.addEventListener('touchstart', this.touchStart, {
      passive: false
    });
    window.addEventListener('touchmove', this.touchMove, {
      passive: false
    });
  },
  destroyed() {
    window.removeEventListener('mousewheel', this.handleMouseWheel, {
      passive: false
    });
    window.removeEventListener('DOMMouseScroll', this.handleMouseWheelDOM);

    window.removeEventListener('touchstart', this.touchStart);
    window.removeEventListener('touchmove', this.touchMove);
  }
});