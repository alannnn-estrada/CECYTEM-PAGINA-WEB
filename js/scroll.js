const scrolld = document.getElementById("SCROLLD");
window.addEventListener("scroll", () =>{
  const { scrollTop, clientHeight, scrollHeight } = document.documentElement;
  const scrolled = (scrollTop/(scrollHeight-clientHeight)*100);
  scrolld.style.width = `${scrolled}%`;
});
