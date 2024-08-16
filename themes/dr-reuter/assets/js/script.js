"use strict";

document.addEventListener("DOMContentLoaded", () => {
  const megaMenuTrigger = document.querySelector(".mega-menu-trigger");
  const megaMenu = document.querySelector(".mega-menu");
  const megaMenuContainer = document.querySelector(".mega-menu .container");
  const htmlCollection = document.querySelector(
    ".navbar nav .navbar-nav"
  ).children;
  const navBar = [...htmlCollection];
  const mainLinks = document.querySelectorAll(
    ".main-links .main-link-container .mail-link-button"
  );
  const subMenus = document.querySelectorAll(
    ".main-links .main-link-container .sub-links"
  );
  const mediaQuery = window.matchMedia("(max-width: 768px)");
  const bodyElement = document.querySelector("body");

  function addClassHandler() {
    megaMenu.classList.add("show");
    bodyElement.classList.add("overflow-hidden");
  }

  function removeClassHandler() {
    megaMenu.classList.remove("show");
    bodyElement.classList.remove("overflow-hidden");
  }

  mainLinks.forEach((e) => {
    e.addEventListener("mouseover", () => {
      subMenus.forEach((e) => {
        e.classList.remove("show");
      });

      if (e && e.nextElementSibling) {
        e.nextElementSibling.classList.add("show");
      }
    });
  });

  navBar.forEach((e) => {
    e.addEventListener("mouseover", removeClassHandler);
  });

  if (!mediaQuery.matches) {
    megaMenuTrigger.addEventListener("mouseover", addClassHandler);
    megaMenuContainer.addEventListener("mouseleave", removeClassHandler);
  }
});
