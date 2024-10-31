<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
        }

        .logo-spacing {
            margin-right: 20px;
        }

        .navbar {
            padding-left: 30px;
            padding-right: 15px;
        }

        .nav-link {
            padding: 0.5rem 1rem;
        }

        @media (min-width: 992px) {
            .navbar .container-fluid {
                justify-content: center;
            }
        }

        .calculator-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .heading h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .heading p {
            font-size: 1.2rem;
            color: #777;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            gap: 20px;
        }

        .form-section,
        .results-section {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
        }

        .form-section h4 {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .btn-primary {
            background-color: #007BFF;
            border: none;
            width: 100%;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        #your-results {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #your-results h4 {
            color: #007BFF;
            margin-bottom: 20px;
        }

        #your-results h3 {
            color: #28a745;
            font-size: 2.5rem;
        }
    </style>
</head>

<body>
    <!-- Nav Start -->
    <nav class="navbar navbar-expand bg-body-tertiary">
        <div class="container-fluid d-flex justify-content-between">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/logos/patrick_logo.png') }}" alt="Logo" class="logo-spacing"
                    style="width: 50px; height: auto;">
            </a>
            <div id="navbarScroll" class="d-flex flex-grow-1 justify-content-center justify-content-lg-between">
                <div class="d-flex flex-row align-items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link me-3">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('investment_calculator.index')" :active="request()->routeIs('investment_calculator.index')" class="nav-link me-3">
                        {{ __('Free Tools') }}
                    </x-nav-link>
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <x-nav-link :href="route('blogs.index')" :active="request()->routeIs('blogs.index')" class="nav-link me-3">
                                {{ __('Blogs') }}
                            </x-nav-link>
                            <x-nav-link :href="route('youtube.index')" :active="request()->routeIs('youtube.index')" class="nav-link me-3">
                                {{ __('Youtube') }}
                            </x-nav-link>
                            <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')" class="nav-link me-3">
                                {{ __('Contact us') }}
                            </x-nav-link>
                        @endif
                    @endauth
                    <x-nav-link :href="route('course.index')" :active="request()->routeIs('course.index')" class="nav-link me-3">
                        {{ __('Courses') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </nav>
    <!-- End of Nav -->

    <div class="calculator-container">
        <div class="heading">
            <h1>Investment Calculator</h1>
            {{-- <p>Owning a time machine isn’t the only way to predict what your investments could be worth in the future.
                Our investment calculator can give you an idea of your earning potential. Plug in your numbers to get
                started.</p> --}}
        </div>

        <div class="flex-container">
            <!-- Form Section -->
            <div class="form-section">
                <h4><i class="fas fa-calculator"></i> Enter Your Information</h4>
                <form id="investmentForm" method="POST" action="{{ route('investment_calculator.calculate') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="current_age" class="form-label">Enter your current age:</label>
                        <input type="number" class="form-control" id="current_age" name="current_age" required>
                        <div id="currentAgeError" class="error-message">Current age cannot be higher than retirement
                            age.</div>
                    </div>
                    <div class="mb-3">
                        <label for="retirement_age" class="form-label">Enter the age you plan to retire:</label>
                        <input type="number" class="form-control" id="retirement_age" name="retirement_age" required>
                        <div id="retirementAgeError" class="error-message">Retirement age cannot be less than 7.</div>
                    </div>
                    <div class="mb-3">
                        <label for="current_investment" class="form-label">How much do you currently have in
                            investments?</label>
                        <input type="number" class="form-control" id="current_investment" name="current_investment"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="monthly_contribution" class="form-label">How much will you contribute
                            monthly?</label>
                        <input type="number" class="form-control" id="monthly_contribution" name="monthly_contribution"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="annual_return" class="form-label">What do you think your annual return will be? (in
                            %)</label>
                        <input type="number" class="form-control" id="annual_return" name="annual_return" required>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" id="calculateButton"><i
                            class="fas fa-calculator"></i> Calculate</button>
                </form>
            </div>

            <!-- Results Section -->
            <div class="results-section">
                <div id="your-results">
                    <h4>Your Results</h4>
                    <p>Estimated Retirement Savings</p>
                    <p id="years-display"></p>
                    <h3 id="result">$0.00</h3>
                    <div class="mt-3">
                        <label for="currency-select" class="form-label">Convert to another currency:</label>
                        <input type="text" id="currency-search" class="form-control"
                            placeholder="Search currency or country">
                        <select id="currency-select" class="form-control mt-2"></select>
                        <button id="convert-button" class="btn btn-secondary mt-2">Convert</button>
                        <p id="converted-result" class="mt-3"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentAgeInput = document.getElementById('current_age');
            const retirementAgeInput = document.getElementById('retirement_age');
            const currentAgeError = document.getElementById('currentAgeError');
            const retirementAgeError = document.getElementById('retirementAgeError');
            const yearsDisplay = document.getElementById('years-display');
            const calculateButton = document.getElementById('calculateButton');
            const investmentForm = document.getElementById('investmentForm');
            const resultElement = document.getElementById('result');
            const currencySelect = document.getElementById('currency-select');
            const currencySearch = document.getElementById('currency-search');
            const convertButton = document.getElementById('convert-button');
            const convertedResult = document.getElementById('converted-result');

            let exchangeRates = {};

            // Fetch currency list and exchange rates
            function fetchCurrencies() {
                $.ajax({
                    url: 'https://api.exchangerate-api.com/v4/latest/USD', // You can use any reliable API
                    method: 'GET',
                    success: function(data) {
                        exchangeRates = data.rates;
                        populateCurrencySelect();
                    },
                    error: function() {
                        alert('Failed to load currency data.');
                    }
                });
            }

            // Populate the currency select dropdown
            function populateCurrencySelect() {
                for (const [currency, rate] of Object.entries(exchangeRates)) {
                    const option = document.createElement('option');
                    option.value = currency;
                    option.textContent = `${currency} - ${getCurrencyName(currency)}`;
                    currencySelect.appendChild(option);
                }
            }

            // Get currency name from code
            function getCurrencyName(currencyCode) {
                const currencyNames = {
                    "USD": "United States Dollar",
                    "EUR": "Euro",
                    "JPY": "Japanese Yen",
                    "GBP": "British Pound Sterling",
                    "AUD": "Australian Dollar",
                    "CAD": "Canadian Dollar",
                    "CHF": "Swiss Franc",
                    "CNY": "Chinese Yuan",
                    "SEK": "Swedish Krona",
                    "NZD": "New Zealand Dollar",
                    "MXN": "Mexican Peso",
                    "SGD": "Singapore Dollar",
                    "HKD": "Hong Kong Dollar",
                    "NOK": "Norwegian Krone",
                    "KRW": "South Korean Won",
                    "TRY": "Turkish Lira",
                    "INR": "Indian Rupee",
                    "RUB": "Russian Ruble",
                    "BRL": "Brazilian Real",
                    "ZAR": "South African Rand",
                    "DKK": "Danish Krone",
                    "PLN": "Polish Zloty",
                    "TWD": "New Taiwan Dollar",
                    "THB": "Thai Baht",
                    "IDR": "Indonesian Rupiah",
                    "HUF": "Hungarian Forint",
                    "CZK": "Czech Koruna",
                    "ILS": "Israeli New Shekel",
                    "CLP": "Chilean Peso",
                    "PHP": "Philippine Peso",
                    "AED": "United Arab Emirates Dirham",
                    "COP": "Colombian Peso",
                    "SAR": "Saudi Riyal",
                    "MYR": "Malaysian Ringgit",
                    "RON": "Romanian Leu",
                    "BGN": "Bulgarian Lev",
                    "ARS": "Argentine Peso",
                    "HRK": "Croatian Kuna",
                    "PEN": "Peruvian Sol",
                    "EGP": "Egyptian Pound",
                    "PKR": "Pakistani Rupee",
                    "VND": "Vietnamese Dong",
                    "KWD": "Kuwaiti Dinar",
                    "BHD": "Bahraini Dinar",
                    "OMR": "Omani Rial",
                    "QAR": "Qatari Riyal",
                    "IRR": "Iranian Rial",
                    "NGN": "Nigerian Naira",
                    "GHS": "Ghanaian Cedi",
                    "KES": "Kenyan Shilling",
                    "TZS": "Tanzanian Shilling",
                    "UGX": "Ugandan Shilling",
                    "MAD": "Moroccan Dirham",
                    "DZD": "Algerian Dinar",
                    "TND": "Tunisian Dinar",
                    "LBP": "Lebanese Pound",
                    "JOD": "Jordanian Dinar",
                    "IQD": "Iraqi Dinar",
                    "LYD": "Libyan Dinar",
                    "AFN": "Afghan Afghani",
                    "XOF": "West African CFA Franc",
                    "XAF": "Central African CFA Franc",
                    "XCD": "East Caribbean Dollar",
                    "BBD": "Barbadian Dollar",
                    "BMD": "Bermudian Dollar",
                    "BND": "Brunei Dollar",
                    "BWP": "Botswana Pula",
                    "BZD": "Belize Dollar",
                    "CDF": "Congolese Franc",
                    "DJF": "Djiboutian Franc",
                    "FJD": "Fijian Dollar",
                    "GIP": "Gibraltar Pound",
                    "GTQ": "Guatemalan Quetzal",
                    "GYD": "Guyanese Dollar",
                    "HTG": "Haitian Gourde",
                    "ISK": "Icelandic Krona",
                    "JMD": "Jamaican Dollar",
                    "KYD": "Cayman Islands Dollar",
                    "LRD": "Liberian Dollar",
                    "LSL": "Lesotho Loti",
                    "MGA": "Malagasy Ariary",
                    "MRO": "Mauritanian Ouguiya",
                    "MUR": "Mauritian Rupee",
                    "MVR": "Maldivian Rufiyaa",
                    "MWK": "Malawian Kwacha",
                    "NAD": "Namibian Dollar",
                    "NIO": "Nicaraguan Cordoba",
                    "PGK": "Papua New Guinean Kina",
                    "PYG": "Paraguayan Guarani",
                    "SBD": "Solomon Islands Dollar",
                    "SCR": "Seychellois Rupee",
                    "SLL": "Sierra Leonean Leone",
                    "SZL": "Swazi Lilangeni",
                    "TOP": "Tongan Pa'anga",
                    "TTD": "Trinidad and Tobago Dollar",
                    "VUV": "Vanuatu Vatu",
                    "WST": "Samoan Tala",
                    "YER": "Yemeni Rial",
                    "ZMW": "Zambian Kwacha"
                };

                return currencyNames[currencyCode] || currencyCode;
            }

            // Filter currencies based on search input
            currencySearch.addEventListener('input', function() {
                const searchQuery = currencySearch.value.toLowerCase();
                const options = currencySelect.options;
                for (let i = 0; i < options.length; i++) {
                    const optionText = options[i].textContent.toLowerCase();
                    options[i].style.display = optionText.includes(searchQuery) ? '' : 'none';
                }
            });

            // Handle the conversion
            convertButton.addEventListener('click', function() {
                const selectedCurrency = currencySelect.value;
                const futureValue = parseFloat(resultElement.textContent.replace(/[^0-9.-]+/g,
                    '')); // Extract numeric value

                if (selectedCurrency && !isNaN(futureValue)) {
                    const conversionRate = exchangeRates[selectedCurrency];
                    const convertedValue = futureValue * conversionRate;
                    convertedResult.textContent =
                        `Converted amount: ${convertedValue.toLocaleString('en-US', { style: 'currency', currency: selectedCurrency })}`;
                } else {
                    alert('Please select a valid currency.');
                }
            });

            function validateAges() {
                const currentAge = parseInt(currentAgeInput.value);
                const retirementAge = parseInt(retirementAgeInput.value);
                let valid = true;

                if (currentAge > retirementAge) {
                    currentAgeError.style.display = 'block';
                    valid = false;
                } else {
                    currentAgeError.style.display = 'none';
                }

                if (retirementAge < 7) {
                    retirementAgeError.style.display = 'block';
                    valid = false;
                } else {
                    retirementAgeError.style.display = 'none';
                }

                return valid;
            }

            function calculateYears() {
                const currentAge = parseInt(currentAgeInput.value);
                const retirementAge = parseInt(retirementAgeInput.value);
                const years = retirementAge - currentAge;

                if (!isNaN(years) && years > 0) {
                    yearsDisplay.textContent = `In ${years} years, your investment could be worth:`;
                } else {
                    yearsDisplay.textContent = '';
                }
            }

            currentAgeInput.addEventListener('input', function() {
                validateAges();
                calculateYears();
            });

            retirementAgeInput.addEventListener('input', function() {
                validateAges();
                calculateYears();
            });

            calculateButton.addEventListener('click', function() {
                if ($('#investmentForm')[0].checkValidity() && validateAges()) {
                    $.ajax({
                        url: investmentForm.action,
                        method: investmentForm.method,
                        data: $(investmentForm).serialize(),
                        success: function(response) {
                            const futureValue = response.future_value;
                            resultElement.textContent =
                                `$${futureValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
                        },
                        error: function() {
                            alert('An error occurred while calculating the investment.');
                        }
                    });
                } else {
                    $('#investmentForm')[0].reportValidity();
                }
            });

            // Initialize the currency converter
            fetchCurrencies();
        });
    </script>
</body>

</html>
