

// Initialize and add the map
function initMap() {
    // The location of Uluru
    var uluru = {lat: -25.344, lng: 131.036};
    // The map, centered at Uluru
    var map = new google.maps.Map(
        document.getElementById('map'), {zoom: 4, center: uluru});
    // The marker, positioned at Uluru
    var marker = new google.maps.Marker({position: uluru, map: map});
}



//select slc batch year

for (i = new Date().getFullYear(); i > 1900; i--)
{
    $('#batch').append($('<option />').val(i).html(i));
}


const Cards = ((() => {
    window.addEventListener('DOMContentLoaded', () => {setTimeout(init,1)}, true);
    function init(e)
    {
      if(document.querySelector(".cards"))
      {
        let cards = document.querySelector(".cards");
        cards.addEventListener('click', clicked, false);
        document.querySelectorAll(".cards .card")[1].click();
      }
    }
    function clicked(e)
    {
      let card = e.target;
      if(card.getAttribute("data-card")){rearrange(card.getAttribute("data-card"));}
    }
    function rearrange(card)
    {
      let cards = document.querySelectorAll(".cards .card");
      for(let n = 0; n < cards.length; n++)
      {
        cards[n].classList.remove("card--left");
        cards[n].classList.remove("card--center");
        cards[n].classList.remove("card--right");
      }
      cards[card].classList.add("card--center");
      if(card == 0)
      {
        cards[2].classList.add("card--left");
        cards[1].classList.add("card--right");
      }
      if(card == 1)
      {
        cards[0].classList.add("card--left");
        cards[2].classList.add("card--right");
      }
      if(card == 2)
      {
        cards[1].classList.add("card--left");
        cards[0].classList.add("card--right");
      }
    }
    return {
      init
    }
  })());
  $(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop()>$(window).height()){
            $('#scrollTop').show();
        }else{
            $('#scrollTop').hide();
        }
})

$("#scrollTop").on("click",function(){
    $(window).scrollTop(0);
    $(this).fadeOut(1000);
 });
  });
