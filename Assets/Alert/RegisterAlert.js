document.getElementById("registerForm").addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    try {
        const response = await fetch("/simple_ecommerce/Route/UserRoute/UserAuth.php", {
            method: "POST",
            body: formData
        });

        const result = await response.json();

        Swal.fire({
            title: result.status === "success" ? "Success!" : "error",
            text: result.message,
            icon: result.status
        }).then(() => {
            if (result.status === "success") {
                window.location.href = "/simple_ecommerce/View/LandingPage.php"; // Redirect if needed
            }
        });

    } catch (error) {
        console.error("Error:", error);
        Swal.fire({
            title: "Error!",
            text: "Something went wrong. Please try again.",
            icon: "error"
        });
    }
});
