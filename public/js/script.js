$("#search_0").on("input", function () {
    if ($("#search_0").val() == "") {
        $("#res_bps_ri").html("").hide();
        $("#res_bps_lampung").html("").hide(); // ganti dari res_bps_aceh
        $("#res_bps_kabkot").html("").hide();
    } else {
        $("#res_bps_ri").show();
        $("#res_bps_lampung").show(); // ganti dari res_bps_aceh
        $("#res_bps_kabkot").show();
    }
    search($("#search_0").val());
});

$("#search_1").on("input", function () {
    if ($("#search_1").val() == "") {
        $("#res_bps_ri").html("").hide();
        $("#res_bps_lampung").html("").hide(); // ganti dari res_bps_aceh
        $("#res_bps_kabkot").html("").hide();
    } else {
        $("#res_bps_ri").show();
        $("#res_bps_lampung").show(); // ganti dari res_bps_aceh
        $("#res_bps_kabkot").show();
    }
    search($("#search_1").val());
});

function search(val) {
    var keyword = val;
    $.post(
        "/search",
        {
            _token: $('meta[name="csrf-token"]').attr("content"),
            keyword: keyword,
        },
        function (data) {
            search_bps_ri(data.lists_bps_ri);
            search_bps_lampung(data.lists_bps_lampung); // <-- Tetap gunakan 'lists_bps_aceh' jika backend belum diubah
            search_bps_kabkot(data.lists_bps_kabkot);
        }
    );
}

// table row with ajax
function search_bps_ri(res) {
    let bps_ri = "";

    if (res.length <= 0) {
        $("#res_bps_ri").html("");
        bps_ri += `
            <p id="not-found" class="text-gray-500 relative col-span-5">Tidak ditemukan di aplikasi BPS RI</p>   
        `;
    } else {
        $("#res_bps_ri").html(`
            <p class="text-gray-500 mb-1">Ditemukan ${res.length} aplikasi BPS RI</p>
            `);

        // bps_ri += `<p class="text-gray-500 col-span-5 col-start-1 col-end-5">Ditemukan ${res.length} aplikasi BPS RI</p>`;
        res.forEach((element) => {
            bg_akses = bps_ri += `   
            <div class="rounded-lg border border-neutral-200 p-2 hit-button" data-id=${
                element.id
            }>
                <a href="${element.link}" target="_blank">
                    <div class="flex flex-row justify-between items-center">
                        <img src="img/${
                            element.logo
                        }" alt="" class="rounded-lg h-10">
                        <span class="${
                            element.akses == "publik"
                                ? "border-[#43a4d4]"
                                : "border-[#e7a861]"
                        } border text-[#282626] rounded-xl text-[10px] flex items-center justify-center px-2">${
                element.akses
            }</span>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="mt-4 text-base font-semibold">${
                            element.nama
                        }</p>
                        <p class="mt-4 text-xs text-gray-500 w-1/4">
                            Hits: <span id="hits-count-${element.id}">${
                element.hits
            }</span>
                        </p>
                    </div>
                    <p class="text-sm text-gray-500">${element.deskripsi}</p>
                </a>
            </div> 
            `;
        });
    }

    $("#bps_ri").html(bps_ri);
}

function search_bps_lampung(res) {
    let bps_lampung = "";

    if (res.length <= 0) {
        $("#res_bps_lampung").html("");
        bps_lampung += `
            <p id="not-found" class="text-gray-500 col-span-full">Tidak ditemukan di aplikasi BPS Provinsi Lampung</p>   
        `;
    } else {
        $("#res_bps_lampung").html(`
            <p class="text-gray-500 mb-1">Ditemukan ${res.length} aplikasi BPS Provinsi Lampung</p>
        `);
        res.forEach((element) => {
            bps_lampung += `
            <div class="rounded-lg border border-neutral-200 p-2 hit-button" data-id=${
                element.id
            }>
                <a href="${element.link}" target="_blank">
                    <div class="flex flex-row justify-between items-center">
                        <img src="img/${
                            element.logo
                        }" alt="" class="rounded-lg h-10">
                        <span class="${
                            element.akses == "publik"
                                ? "border-[#43a4d4]"
                                : "border-[#e7a861]"
                        } border text-[#282626] rounded-xl text-[10px] flex items-center justify-center px-2">${
                element.akses
            }</span>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="mt-4 text-base font-semibold">${
                            element.nama
                        }</p>
                        <p class="mt-4 text-xs text-gray-500 w-1/4">
                            Hits: <span id="hits-count-${element.id}">${
                element.hits
            }</span>
                        </p>
                    </div>
                    <p class="text-sm text-gray-500">${element.deskripsi}</p>
                </a>
            </div>  
            `;
        });
    }

    $("#bps_lampung").html(bps_lampung);
}

function search_bps_kabkot(res) {
    let bps_kabkot = "";

    if (res.length <= 0) {
        $("#res_bps_kabkot").html("");
        bps_kabkot += `
            <p id="not-found" class="text-gray-500 col-span-full">Tidak ditemukan di aplikasi BPS Kabupaten/Kota se-Provinsi Lampung</p>   
        `;
    } else {
        $("#res_bps_kabkot").html(`
            <p class="text-gray-500 mb-1">Ditemukan ${res.length} aplikasi BPS BPS Kabupaten/Kota se-Provinsi lampung</p>
            `);
        res.forEach((element) => {
            bps_kabkot += `
            <div class="rounded-lg border border-neutral-200 p-2 hit-button" data-id=${
                element.id
            }>
                <a href="${element.link}" target="_blank">
                    <div class="flex flex-row justify-between items-center mb-2">
                        <img src="img/${
                            element.logo
                        }" alt="" class="rounded-lg h-10">
                        <span class="${
                            element.akses == "publik"
                                ? "border-[#43a4d4]"
                                : "border-[#e7a861]"
                        } border text-[#282626] rounded-xl text-[10px] flex items-center justify-center px-2">${
                element.akses
            }</span>
                    </div>
                    <span class="bg-[#1EA05E] text-white rounded-xl text-[10px] px-2">${
                        element.pembuat
                    }</span>
                    <div class="flex flex-row justify-between items-center">
                        <p class="text-base font-semibold w-3/4">${
                            element.nama
                        }</p>
                        <p class="mt-4 text-xs text-gray-500 w-1/4">
                            Hits: <span id="hits-count-${element.id}">${
                element.hits
            }</span>
                        </p>
                    </div>
                    <p class="text-sm text-gray-500">${element.deskripsi}</p>
                </a>
            </div>  
            `;
        });
    }

    $("#bps_kabkot").html(bps_kabkot);
}

$(document).ready(function () {
    $(document).on("click", ".hit-button", function (e) {
        e.preventDefault(); // Mencegah tindakan default sementara

        var id = $(this).data("id");
        var url = $(this).find("a").attr("href"); // Ambil URL dari atribut href

        $.ajax({
            url: "/updatehits", // Sesuaikan URL dengan rute Anda
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                item_id: id,
            },
            success: function (response) {
                const hitCountElement = $(`#hits-count-${id}`);
                if (hitCountElement.length > 0) {
                    hitCountElement.text(parseInt(hitCountElement.text()) + 1);
                } else {
                    console.error(`Element with ID hits-count-${id} not found`);
                }
                // Setelah sukses, buka link di tab baru
                window.open(url, "_blank");
            },
            error: function (xhr, status, error) {
                console.error("Error updating hit count:", xhr.responseText);
                // Jika ada error, tetap buka link di tab baru
                window.open(url, "_blank");
            },
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    function setupToggle(toggleButtonId, contentId, isOpenInitially) {
        const toggleButton = document.getElementById(toggleButtonId);
        const content = document.getElementById(contentId);
        const chevronIcon = toggleButton.querySelector(".chevron");

        if (isOpenInitially) {
            content.classList.add("max-height-full");
            chevronIcon.classList.add("chevron-up");
        } else {
            content.classList.remove("max-height-full");
            chevronIcon.classList.add("chevron-down");
        }

        toggleButton.addEventListener("click", function () {
            if (content.classList.contains("max-height-full")) {
                content.classList.remove("max-height-full");
                chevronIcon.classList.remove("chevron-up");
                chevronIcon.classList.add("chevron-down");
            } else {
                content.classList.add("max-height-full");
                chevronIcon.classList.remove("chevron-down");
                chevronIcon.classList.add("chevron-up");
            }
        });
    }

    setupToggle("toggle-chevron", "bps_ri", false);
    setupToggle("toggle-chevron-lampung", "bps_lampung", false);
    setupToggle("toggle-chevron-kab", "bps_kabkot", false);

    $("#search_0").on("input", function () {
        setupToggle("toggle-chevron", "bps_ri", true);
        setupToggle("toggle-chevron-lampung", "bps_lampung", true);
        setupToggle("toggle-chevron-kab", "bps_kabkot", true);
    });
    $("#search_1").on("input", function () {
        setupToggle("toggle-chevron", "bps_ri", true);
        setupToggle("toggle-chevron-lampung", "bps_lampung", true);
        setupToggle("toggle-chevron-kab", "bps_kabkot", true);
    });
});
