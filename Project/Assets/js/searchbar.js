const searchInput = () => {
  let filter = document.getElementById("search").value.toUpperCase();
  let ul = document.getElementById("results");
  let li = ul.getElementsByTagName("li");

  for (var i = 0; i < li.length; i++) {
    let a = li[i].getElementsByTagName("a")[0];
    let textValue = a.textContent;

    if (textValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  } //for loop
}; //searchInput

//functional search
var search = document.getElementById("search");
var resultsElement = document.getElementById("results");

search.onclick = function (event) {
  event.stopPropagation();

  search.classList.toggle("active");
  var isActive = search.classList.contains("active");

  if (isActive) {
    resultsElement.style.display = "block";
    setTimeout(function () {
      resultsElement.style.opacity = 1;
    }, 0);
  } else {
    resultsElement.style.opacity = 0;
    setTimeout(function () {
      resultsElement.style.display = "none";
    }, 300);
  }
};

document.addEventListener("click", function (event) {
  if (
    !search.contains(event.target) &&
    !resultsElement.contains(event.target)
  ) {
    resultsElement.style.opacity = 0;
    setTimeout(function () {
      resultsElement.style.display = "none";
      search.classList.remove("active");
    }, 300);
  }
});

//keywords for search
var pageMappings = [
  {
    names: [
      "eye",
      "ophthalmologist",
      "eye doctor",
      "eye surgeon",
      "eye specialist",
      "eye infection",
      "eye test",
      "eye checkup",
      "eye disease",
    ],
    url: "./Specialists.php?specialist=eye",
  },
  {
    names: [
      "heart",
      "cardiologist",
      "cardiology",
      "heart attack",
      "heart disease",
      "heart failure",
      "heart ache",
    ],
    url: "./Specialists.php?specialist=heart",
  },
  {
    names: ["dentist", "teeth", "teeth disease"],
    url: "./Specialists.php?specialist=dentist",
  },
  {
    names: ["neurologist", "brain", "brain disease"],
    url: "./Specialists.php?specialist=neurologist",
  },
  {
    names: ["psychiatrist", "depression", "anxiety", "stress"],
    url: "./Specialists.php?specialist=psychiatrist",
  },
  {
    names: [
      "nutritionist",
      "dietitian",
      "weight loss",
      "overweight",
      "obesity",
    ],
    url: "./Specialists.php?specialist=nutritionist",
  },
  {
    names: ["gynecologist", "gynecology"],
    url: "./Specialists.php?specialist=gynecologist",
  },
  {
    names: ["ent", "ear", "ear disease"],
    url: "./Specialists.php?specialist=ear",
  },
];

var searchForm = document.getElementById("search-form");
var searchbarjsjs = document.getElementById("search");

searchForm.addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent the form from submitting

  var searchTerm = search.value.trim().toLowerCase();
  var targetPage = pageMappings.find((mapping) =>
    mapping.names.includes(searchTerm)
  );

  if (targetPage) {
    window.location.href = targetPage.url;
  } else {
    // Handle case when page name doesn't exist
    Swal.fire({
      icon: "error",
      title: "Page not found !",
      text: "The page you are looking for does not exist.",
      width: 600,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      customClass: {
        confirmButton: "btn-class",
        buttonsStyling: false,
        heightAuto: false,
        popup: "custom-swal-font-size",
        title: "custom-swal-font-size",
        htmlContainer: "custom-swal-font-size",
        text: "custom-swal-font-size",
      },
    });
  }
});
