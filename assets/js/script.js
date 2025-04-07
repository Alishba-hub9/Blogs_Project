AOS.init();
// Template for displaying blogs on the home page.
const blogStylingTemplate = (blog) => `
    <a class="blog-title-link" href="blogs?id=${blog.id}">
        <h2 class="blog-title">${blog.title}</h2>
        <h3 class="blog-subtitle">${blog.subtitle}</h3>
    </a>
        <p class="blog-meta">Posted by <a href="javascript:void(0)">${blog.author}</a> on ${blog.posted_at}</p>
    <hr class="my-4">
`;

// Template for displaying a single blog post.
const singleBlogDisplayTemplate = (blog) => `
    <h1 class="blog-post-title">${blog.title}</h1>
    <p class="sub-heading-blog">${blog.subtitle}</p>
    <p class="blog-meta">Posted by <a href="javascript:void(0)">${blog.author}</a> on ${blog.posted_at}</p>
`;

// Template for displaying blog on the dashboard.
const dashboardBlogDisplayTemplate = (blog) => `
    <div class="blog-card" data-id="${blog.id}">
        <div class="text-controller-div">
            <div class="view-mode">
                <h3>${blog.title}</h3>
                <p>${blog.subtitle}</p>
                <p>Author: ${blog.author}</p>
                <p>${blog.content}</p>
            </div>
            <div class="edit-mode">
                <h3>Edit Your Blog</h3>
                <input type="text" class="edit-input" data-key="title" value="${blog.title}" placeholder="Title"><br>
                <input type="text" class="edit-input" data-key="subtitle" value="${blog.subtitle}" placeholder="Subtitle"><br>
                <input type="text" class="edit-input" data-key="author" value="${blog.author}" placeholder="Author"><br>
                <textarea class="edit-input" data-key="content" id="content" placeholder="Content">${blog.content}</textarea><br>
                <button class="save-btn" data-id="${blog.id}">Save</button>
                <button class="cancel-btn" data-id="${blog.id}">Cancel</button>
            </div>
        </div>
        <div class="actions">
            <button class="edit-btn" data-id="${blog.id}"><i class="fas fa-pencil-alt"></i> Edit</button>
            <button class="delete-btn" data-id="${blog.id}"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
    </div>
`;

//template for no blogs available
const noBlogsMessage = () => `
  <div class="no-blogs-message">
    <p>No blogs available at the moment.</p>
  </div>
`;

//show toast function
const showToast = (message, type = "success") => {
  Toastify({
    text: message,
    duration: 3000,
    close: true,
    gravity: "top",
    position: "right",
    style: {
      background: type === "success" ? "#28a745" : "#dc3545",
    },
  }).showToast();
};

//disable buttons after one click function
const toggleButton = (button, disable) => {
  button.prop("disabled", disable);
};

const baseURL = window.location.pathname.includes("admin/") ? "../includes/blogs_db.php" : "includes/blogs_db.php";

// Loads blogs for the dashboard and home page.
const loadBlogsData = async (scope = "all") => {
  try {
    const response = await $.ajax({
      url: baseURL,
      method: "GET",
      dataType: "json",
      data: { method: "get_all", scope },
    });

    if (response.status === "success" && response.blogs?.length > 0) {
      $(".dashboard-blogs").html(response.blogs.map(dashboardBlogDisplayTemplate).join(""));
      $(".blog-posts-content").html(response.blogs.map(blogStylingTemplate).join(""));
    } else {
      const noBlogsMessageContent = noBlogsMessage();
      $(".dashboard-blogs").html(noBlogsMessageContent);
      $(".blog-posts-content").html(noBlogsMessageContent);
    }
  } catch (error) {
    console.error("Error Fetching Blogs To Page:", error);
  }
};

// Fetches a single blog post by its ID on single blog pg.
const fetchSingleBlog = async (blogId) => {
  try {
    const response = await $.ajax({
      url: baseURL,
      method: "GET",
      data: { method: "get_single_blog", id: blogId },
      dataType: "json",
    });
    if (response.status === "success" && response.get_single_blog) {
      $(".blogs-header-content").html(singleBlogDisplayTemplate(response.get_single_blog));
      $(".single-blog-body-content").html(response.get_single_blog.content);
    }
  } catch (error) {
    showToast("Failed to retrieve blog. Please try again later.", "error");
  }
};

// Load Single Blog if on blogs.php
if (document.URL.includes("blogs")) fetchSingleBlog(new URLSearchParams(window.location.search).get("id"));

// User Login Form
$(".login-form").on("submit", async (e) => {
  e.preventDefault();
  const form = $(e.currentTarget);
  const button = form.find("button[type='submit']");
  toggleButton(button, true);

  const formData = form.serialize();
  try {
    const response = await $.ajax({
      url: "includes/login.php",
      method: "POST",
      data: formData,
      dataType: "json",
    });

    if (response.success) {
      window.location.href = "admin/dashboard";
    } else {
      showToast(response.message, "error");
    }
  } catch (error) {
    showToast("Something went wrong. Try again.", "error");
  } finally {
    toggleButton(button, false);
  }
});

// User Signup Form
$(".register-form").on("submit", async (e) => {
  e.preventDefault();
  const form = $(e.currentTarget);
  const button = form.find("button[type='submit']");
  toggleButton(button, true);

  const formData = form.serialize();
  try {
    const response = await $.ajax({
      url: "includes/signup.php",
      method: "POST",
      data: formData,
      dataType: "json",
    });

    showToast(response.message, response.success ? "success" : "error");

    if (response.success) form[0].reset();
  } catch (error) {
    showToast("Something went wrong. Try again.", "error");
  } finally {
    toggleButton(button, false);
  }
});

// Create New Blog Form
$(".blog-data-form").on("submit", async (e) => {
  e.preventDefault();
  const form = $(e.currentTarget);
  const button = form.find("button[type='submit']");
  toggleButton(button, true);

  const formData = new FormData(e.currentTarget);
  formData.set("content", tinymce.get("content").getContent());

  try {
    const response = await $.ajax({
      url: "../includes/blogs_db.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
    });

    if (response.status === "success") {
      showToast("Blog posted successfully!");
      form[0].reset();
    } else {
      showToast(response.message, "error");
    }
  } catch (error) {
    showToast("Error posting blog", "error");
  } finally {
    toggleButton(button, false);
  }
});

// Blog Editing
$(".dashboard-blogs").on("click", ".edit-btn", async (e) => {
  const blog = $(e.currentTarget).closest(".blog-card");
  const blogId = blog.data("id");
  $(".dashboard-blogs").addClass("edit-mode-active");
  $(".dashboard-blogs .actions").hide();

  try {
    const response = await $.ajax({
      url: "../includes/blogs_db.php",
      method: "GET",
      data: { method: "get_single_blog", id: blogId },
      dataType: "json",
    });

    if (response.status === "success") {
      blog.find(".view-mode").hide();
      blog.find(".edit-mode").show();
    }
  } catch (error) {
    showToast("Error fetching blog data", "error");
  }
});

// Blog Submitting after Editing (Updating)
$(".dashboard-blogs").on("click", ".save-btn", async (e) => {
  const button = $(e.currentTarget);
  toggleButton(button, true);
  const blog = $(e.currentTarget).closest(".blog-card");
  const id = blog.data("id");
  $(".dashboard-blogs").removeClass("edit-mode-active");

  const formJSON = { id };
  blog.find(".edit-input").each(function () {
    formJSON[$(this).data("key")] = $(this).val();
  });
  formJSON["content"] = tinymce.get("content").getContent();

  try {
    const response = await $.ajax({
      url: "../includes/blogs_db.php",
      method: "PATCH",
      data: JSON.stringify(formJSON),
      contentType: "application/json",
      dataType: "json",
    });
    if (response.status === "success") {
      loadBlogsData("user");
      blog.find(".edit-mode").hide();
      blog.find(".view-mode").show();
      showToast("Blog updated successfully!");
    }
  } catch (error) {
    showToast("Error updating blog", "error");
  } finally {
    toggleButton(button, false);
  }
});

// Cancelling Edit Mode Of Form
$(".dashboard-blogs").on("click", ".cancel-btn", (e) => {
  const blog = $(e.currentTarget).closest(".blog-card");
  blog.find(".edit-mode").hide();
  blog.find(".view-mode").show();
  blog.find(".actions").show();
  $(".dashboard-blogs").removeClass("edit-mode-active");
});

// Deleting Blog
$(".dashboard-blogs").on("click", ".delete-btn", async (e) => {
  const button = $(e.currentTarget);
  toggleButton(button, true);

  const id = $(e.currentTarget).data("id");
  const blog = $(e.currentTarget).closest(".blog-card");
  try {
    await $.ajax({
      url: "../includes/blogs_db.php",
      method: "DELETE",
      data: JSON.stringify({ id }),
      contentType: "application/json",
      dataType: "json",
    });
    blog.fadeOut(300, () => blog.remove());
    showToast("Blog deleted successfully!");
  } catch (error) {
    showToast("Error deleting blog", "error");
  } finally {
    toggleButton(button, false);
  }
});

// Handle search input and show live suggestions
$(".search-field").on("input", ".blog-search", async function () {
  const query = $(this).val().trim().toLowerCase();
  const suggestionsBox = $(this).siblings(".suggestions").empty().hide();
  if (!query) return;

  try {
    const response = await $.ajax({
      url: "includes/search.php",
      method: "GET",
      data: { query },
      dataType: "json",
    });

    if (!response.length) {
      suggestionsBox.html("<div class='no-result'>No results found</div>").show();
      return;
    }

    response.forEach((blog) => {
      const template = $(".suggestion-template .search-result").clone();
      template.attr("data-id", blog.id);
      const highlightedTitle = blog.title.replace(
        new RegExp(query, "gi"),
        (match) => `<span class='highlighted-search-text'>${match}</span>`
      );
      template.find(".result-title").html(highlightedTitle);
      template.hide().appendTo(suggestionsBox).fadeIn(200);
    });

    suggestionsBox.show();
  } catch (error) {
    showToast("Error fetching search results", "error");
  }
});

// Handle form submission (Enter key or search button click)
$(".search-field").on("submit", function (e) {
  e.preventDefault();

  const firstResult = $(this).find(".suggestions .search-result").first();
  const id = firstResult.data("id");
  if (!id) return;

  window.location.href = `blogs?id=${id}`;
  $(this).find(".blog-search").val("");
});

// Handle suggestion click
$(".search-field").on("click", ".search-result", function () {
  const id = $(this).data("id");
  if (!id) return;

  window.location.href = `blogs?id=${id}`;
  $(".blog-search").val("");
});

//Overall Blogs Will load when pgs are Home or dashboard
if (window.location.pathname.includes("home")) {
  loadBlogsData("all");
}

if (window.location.pathname.includes("dashboard")) {
  loadBlogsData("user");
}

//mbl-screens search toggle
$(".search-text-button").on("click", (e) => {
  e.stopPropagation();
  $(".search-field").toggleClass("search-field-active");
});

//navbar and seemore button sticky and absolute on scroll
let lastScrollTop = 0;
let navbar = $(".header-navbar");
let floatingBtn = $(".floating-btn");
let blogSection = $(".blog-posts-content");

$(window).on("scroll", () => {
  let scrollTop = $(window).scrollTop();

  if (scrollTop > lastScrollTop) {
    navbar.removeClass("sticky");
  } else if (scrollTop === 0) {
    navbar.removeClass("sticky");
  } else {
    navbar.addClass("sticky");
  }

  lastScrollTop = scrollTop;
});

$(window).on("scroll", () => {
  const scrollTop = $(window).scrollTop();
  const blogTop = blogSection.offset().top;
  const windowHeight = $(window).height();

  if (scrollTop + windowHeight > blogTop + 200) {
    floatingBtn.fadeOut();
  } else {
    floatingBtn.fadeIn();
  }

  lastScrollTop = scrollTop;
});

$(".floating-btn").on("click", () => {
  $("html, body").animate(
    {
      scrollTop: blogSection.offset().top,
    },
    600
  );
});
