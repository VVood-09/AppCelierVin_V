<!-- Donner du crédit à celui qui a créé -->
<!-- https://codepen.io/rehhouari/pen/NWdrXjz -->
<form action="#" onsubmit="return false">
  <meta name="csrf-token" content="{{ csrf_token() }}" />     
  <div x-data="
    {
      rating: {{$note}},
      hoverRating: {{$note}},
      ratings: [{'amount': 1, 'label':'Terrible'}, {'amount': 2, 'label':'Mauvais'}, {'amount': 3, 'label':'Correct'}, {'amount': 4, 'label':'Bon'}, {'amount': 5, 'label':'Excellent'}],
      rate(amount) {
        if (this.rating == amount) {
          this.rating = 0;
        }
        else this.rating = amount;
      },
      currentLabel() {
         let r = this.rating;
        if (this.hoverRating != this.rating) r = this.hoverRating;
        let i = this.ratings.findIndex(e => e.amount == r);
        if (i >=0) {return this.ratings[i].label;} else {return ''};     
      }
    }
    ">
    <div>
      <template x-for="(star, index) in ratings" :key="index">
        <button @click="rate(star.amount)" x-on:click="changeNote(star.amount, {{$note}})" @mouseover="hoverRating = star.amount" @mouseleave="hoverRating = rating"
          aria-hidden="true"
          :title="star.label"
          class="note note_vide"
          :class="{'note_hover': hoverRating >= star.amount, 'note_jaune': rating >= star.amount && hoverRating >= star.amount}">
          <svg class="transition duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
          </svg>
        </button>
      </template>
    </div>      
  </div>
</form>