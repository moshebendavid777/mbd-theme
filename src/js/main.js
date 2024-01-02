import 'bootstrap';

document.addEventListener("DOMContentLoaded", function () {
  // Enable Bootstrap 5 dropdowns on hover
  document.querySelectorAll(".navbar-nav .nav-item.dropdown").forEach(function (dropdown) {
    dropdown.addEventListener("mouseover", function () {
      this.classList.add("show");
      this.querySelector(".dropdown-menu").classList.add("show");
    });

    dropdown.addEventListener("mouseout", function () {
      this.classList.remove("show");
      this.querySelector(".dropdown-menu").classList.remove("show");
    });
  });
});

const calculateTax = () => {
  const grossIncomeInput = document.getElementById('grossIncome');
  const resultWrapElement = document.querySelector('.wbx__tax-calculator__results');
  const resultElement = document.getElementById('result');
  const resultHeadingElement = document.getElementById('result_heading');

  if (!grossIncomeInput || !resultElement) {
    console.error('Required elements not found.');
    return;
  }

  const grossIncome = parseFloat(grossIncomeInput.value);

  if (isNaN(grossIncome)) {
    console.error('Invalid input for gross income.');
    return;
  }

  let tax = 0;

  if (grossIncome <= 10000) {
    tax = grossIncome * 0.1;
  } else if (grossIncome <= 50000) {
    tax = 10000 * 0.1 + (grossIncome - 10000) * 0.2;
  } else {
    tax = 10000 * 0.1 + 40000 * 0.2 + (grossIncome - 50000) * 0.3;
  }

  const formattedTax = tax.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 });
  resultWrapElement.classList.add('results_active');
  resultHeadingElement.textContent = 'Estimated Federal Income Tax';
  resultElement.textContent = `${formattedTax}`;
};

// Attach the event listener using JavaScript
const calculateButton = document.getElementById('calculateButton');
if (calculateButton) {
  calculateButton.addEventListener('click', calculateTax);
}


const calculateCapitalGainsTax = () => {
  console.log('clicked');
  const purchasePrice = parseFloat(document.getElementById('capital_gainsTax--purchase').value);
  const salePrice = parseFloat(document.getElementById('capital_gainsTax--sale').value);
  const holdingPeriod = parseFloat(document.getElementById('capital_gainsTax--years').value);
  const resultWrapElement = document.getElementById('result');
  if (isNaN(purchasePrice) || isNaN(salePrice) || isNaN(holdingPeriod)) {

    Swal.fire({
      html: '<strong>Error</strong><br>Please enter valid numbers for all inputs.',
      icon: 'error',
      confirmButtonText: 'OK',
    })

    return;
  }

  // Calculate capital gain and tax
  var capitalGain = salePrice - purchasePrice;
  var taxableGain = 0;
  var taxRate = 0;

  if (holdingPeriod < 1) {
    // Short-term capital gain
    taxableGain = capitalGain;
    taxRate = 0.2; // 20% tax rate for short-term gains
  } else {
    // Long-term capital gain
    taxableGain = capitalGain * 0.6; // Only 60% of long-term capital gain is taxable
    taxRate = 0.1; // 10% tax rate for long-term gains
  }
  var tax = taxableGain * taxRate;

  // Display result
  resultWrapElement.classList.add('results_active');
  resultWrapElement.innerHTML = '<p class="resultItem"><span>Capital Gain:</span> ' + capitalGain.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</p>'
    + '<p class="resultItem"><span>Taxable Gain:</span> ' + taxableGain.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</p>'
    + '<p class="resultItem"><span>Tax Rate:</span> ' + (taxRate * 100) + '%</p>'
    + '<p class="resultItem"><span>Tax:</span> ' + tax.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 }) + '</p>';
};

// Attach the event listener using JavaScript
const calculateButtonGains = document.getElementById('calculateButton--gains');
if (calculateButtonGains) {
  calculateButtonGains.addEventListener('click', calculateCapitalGainsTax);
}

const calculateCharitableRemainder = () => {
  const principalAmount = parseFloat(document.getElementById('charitable_remainder--principal').value);
  const annualPayment = parseFloat(document.getElementById('charitable_remainder--annual').value);
  const paymentTerm = parseFloat(document.getElementById('charitable_remainder--years').value);
  const resultWrapElement = document.getElementById('wbx__tax-calculator__results');
  const resultHeadingElement = document.getElementById('result_heading');


  if (isNaN(principalAmount) || isNaN(annualPayment) || isNaN(paymentTerm)) {
    Swal.fire({
      html: '<strong>Error</strong><br>Please enter valid numbers for all inputs.',
      icon: 'error',
      confirmButtonText: 'OK',
    })
    return;
  }

  const totalPayments = annualPayment * paymentTerm;
  const charitableRemainder = principalAmount - totalPayments;

  resultWrapElement.classList.add('results_active');
  const resultElement = document.getElementById('result');
  resultHeadingElement.textContent = 'Charitable Remainder';
  resultElement.innerHTML = charitableRemainder.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 });
};

// Attach the event listener using JavaScript
const calculateButtonCharit = document.getElementById('calculateButton--charitable_remainder');
if (calculateButtonCharit) {
  calculateButtonCharit.addEventListener('click', calculateCharitableRemainder);
}



const calculateQSBS = () => {
  const investmentAmount = parseFloat(document.getElementById('investmentAmount').value);
  const gainAmount = parseFloat(document.getElementById('investmentGain').value);
  const resultWrapElement = document.getElementById('wbx__tax-calculator__results');
  const resultHeadingElement = document.getElementById('result_heading');


  if (isNaN(investmentAmount) || isNaN(gainAmount)) {
    Swal.fire({
      html: '<strong>Error</strong><br>Please enter valid numbers for all inputs.',
      icon: 'error',
      confirmButtonText: 'OK',
    })
    return;
  }

  const qualifiedGain = Math.min(investmentAmount, gainAmount);
  const exclusionPercentage = 0.75; // Simplified exclusion percentage

  const qualifiedExclusion = qualifiedGain * exclusionPercentage;

  resultWrapElement.classList.add('results_active');
  const resultElement = document.getElementById('result');
  resultHeadingElement.textContent = 'Qualified Small Business Stock Exclusion';

  resultElement.innerHTML = qualifiedExclusion.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 });
};

const calculateButtonQsbs = document.getElementById('calculateButton--qsbs');
if (calculateButtonQsbs) {
  calculateButtonQsbs.addEventListener('click', calculateQSBS);
}

const calculateEstateTax = () => {
  const grossEstimate = parseFloat(document.getElementById('estate_tax--gross').value);
  const debtExpenses = parseFloat(document.getElementById('estate_tax--debt').value);
  const maritalDeduction = parseFloat(document.getElementById('estate_tax--marital').value);
  const resultWrapElement = document.getElementById('wbx__tax-calculator__results');
  const resultHeadingElement = document.getElementById('result_heading');


  if (isNaN(grossEstimate) || isNaN(debtExpenses) || isNaN(maritalDeduction)) {
    Swal.fire({
      html: '<strong>Error</strong><br>Please enter valid numbers for all inputs.',
      icon: 'error',
      confirmButtonText: 'OK',
    })
    return;
  }

  const taxableEstate = grossEstimate - debtExpenses - maritalDeduction;
  const estateTaxRate = 0.4; // Simplified estate tax rate

  const estateTax = taxableEstate * estateTaxRate;

  resultHeadingElement.textContent = 'Estimated Estate Tax';

  resultWrapElement.classList.add('results_active');
  const resultElement = document.getElementById('result');
  resultElement.innerHTML = estateTax.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 });
};


const calculateButtonEstate = document.getElementById('calculateButton--estate_tax');
if (calculateButtonEstate) {
  calculateButtonEstate.addEventListener('click', calculateEstateTax);
}



const calculateFamily = () => {
  const assets = parseFloat(document.getElementById('familyAssets').value);
  const resultElement = document.getElementById('result');
  const resultHeadingElement = document.getElementById('result_heading');

  if (isNaN(assets)) {
    Swal.fire({
      html: '<strong>Error</strong><br>Please enter a valid number for assets.',
      icon: 'error',
      confirmButtonText: 'OK',
    });
    return;
  }

  if (assets >= 4200000) {
    resultHeadingElement.textContent = 'Family Office Services';
    resultElement.textContent = 'You may benefit from family office services.';
  } else {
    resultHeadingElement.textContent = 'Family Office Services';
    resultElement.textContent = 'You do not need family office services at this time.';
  }
};

const calculateButtonFam = document.getElementById('calculateButton--family');
if (calculateButtonFam) {
  calculateButtonFam.addEventListener('click', calculateFamily);
}



const calculateCarried = () => {
  const amount = parseFloat(document.getElementById('carried_interestAmount').value);
  const rate = parseFloat(document.getElementById('carried_interestRate').value);
  const resultElement = document.getElementById('result');
  const resultHeadingElement = document.getElementById('result_heading');
  const resultWrapElement = document.getElementById('wbx__tax-calculator__results');


  if (isNaN(amount)) {
    Swal.fire({
      html: '<strong>Error</strong><br>Please enter a valid number for assets.',
      icon: 'error',
      confirmButtonText: 'OK',
    });
    return;
  }

  const carryTax = (amount * rate) / 100;
  resultWrapElement.classList.add('results_active');
  resultHeadingElement.textContent = 'Carry Tax';
  resultElement.innerHTML = carryTax.toLocaleString(undefined, { style: 'currency', currency: 'USD', minimumFractionDigits: 2, maximumFractionDigits: 2 });

};

const calculateButtonCarried = document.getElementById('calculateButton--carried');
if (calculateButtonCarried) {
  calculateButtonCarried.addEventListener('click', calculateCarried);
}