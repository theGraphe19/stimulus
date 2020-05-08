var animation = bodymovin.loadAnimation({
  container: document.getElementById('lottie'), // Required
  path: 'https://maxst.icons8.com/vue-static/landings/animated-icons/icons/checkmark-ok/checkmark-ok.json', // Required
  renderer: 'svg/canvas/html', // Required
  loop: true, // Optional
  autoplay: true, // Optional
  name: "Hello World", // Name for future reference. Optional.
})