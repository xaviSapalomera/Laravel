/* When the user clicks on the button, toggle between hiding and showing the dropdown content */
function myFunction(): void {
    const dropdown: HTMLElement | null = document.getElementById("myDropdown");
    if (dropdown) {
      dropdown.classList.toggle("show");
    }
  }
  
  /* Close the dropdown menu if the user clicks outside of it */
  window.onclick = function (event: MouseEvent): void {
    const target = event.target as Element;
    const dropdown: HTMLElement | null = document.getElementById("myDropdown");
    const dropdownButton: HTMLElement | null = document.querySelector(".dropbtn");
  
    // Verifica si el clic no fue en el botón ni en el menú desplegable
    if (
      dropdown &&
      dropdownButton &&
      !dropdown.contains(target) &&
      !dropdownButton.contains(target)
    ) {
      dropdown.classList.remove("show");
    }
  };
  