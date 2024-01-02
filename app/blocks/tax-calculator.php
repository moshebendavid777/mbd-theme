<?php
/**
 * Custom Tax Calculator.
 *
 * @package mbd-theme
 */

$form_type = get_field( 'calculator' );
?>

<div class="wbx__tax-calculator is-<?php echo esc_attr( $form_type ); ?>">
    <div id="wbx__tax-calculator__results" class="wbx__tax-calculator__results">
        <p id="result_heading" class="wbx__tax-calculator__results--heading"></p>
        <div id="result" class="wbx__tax-calculator__results--amount"></div>
    </div>

    <div class="wbx__tax-calculator__form">

        <?php
        switch ( $form_type ) {
            case 'income_tax':
                while ( true ) :
        ?>
                    <label for="grossIncome">Enter your taxable income:</label>
                    <input id="grossIncome" type="number">
                    <button id="calculateButton" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            case 'capital_gains_tax':
                while ( true ) :
        ?>
                    <div class="row d-flex">
                        <div class="col-12 col-lg-4">
                            <label for="capital_gainsTax--purchase">Purchase Price:</label>
                            <input id="capital_gainsTax--purchase" type="number">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="capital_gainsTax--sale">Sale Price:</label>
                            <input id="capital_gainsTax--sale" type="number">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="capital_gainsTax--years">Holding Period:</label>
                            <input id="capital_gainsTax--years" type="number">
                        </div>
                    </div>

                    <button id="calculateButton--gains" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            case 'charitable_remainder':
                while ( true ) :
        ?>
                    <div class="row d-flex">
                        <div class="col-12 col-lg-4">
                            <label for="charitable_remainder--principal">Principal Amount:</label>
                            <input id="charitable_remainder--principal" type="number">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="charitable_remainder--annual">Annual Payment:</label>
                            <input id="charitable_remainder--annual" type="number">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="charitable_remainder--years">Payment Terms (years):</label>
                            <input id="charitable_remainder--years" type="number">
                        </div>
                    </div>

                    <button id="calculateButton--charitable_remainder" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            case 'qsbs':
                while ( true ) :
        ?>
                    <label for="investmentAmount">Enter the amount of your investment:</label>
                    <input id="investmentAmount" type="number">

                    <label for="investmentGain">Enter the amount of gain:</label>
                    <input id="investmentGain" type="number">
                    <button id="calculateButton--qsbs" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            case 'family_office':
                while ( true ) :
        ?>
                    <label for="familyAssets">Total Value of Assets:</label>
                    <input id="familyAssets" type="number">
                    <button id="calculateButton--family" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            case 'estate_text':
                while ( true ) :
        ?>
                    <div class="row d-flex">
                        <div class="col-12 col-lg-4">
                            <label for="estate_tax--gross">Gross Estate Value:</label>
                            <input id="estate_tax--gross" type="number">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="estate_tax--debt">Debt and Expenses:</label>
                            <input id="estate_tax--debt" type="number">
                        </div>
                        <div class="col-12 col-lg-4">
                            <label for="estate_tax--marital">Marital Deduction:</label>
                            <input id="estate_tax--marital" type="number">
                        </div>
                    </div>

                    <button id="calculateButton--estate_tax" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            case 'carried_interest':
                while ( true ) :
        ?>
                    <label for="carried_interestAmount">Carry Amount:</label>
                    <input id="carried_interestAmount" type="number">

                    <label for="carried_interestRate">Tax Rate (%):</label>
                    <input id="carried_interestRate" type="number">
                    <button id="calculateButton--carried" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;

            default:
                while ( true ) :
        ?>
                    <label for="grossIncome">Enter your taxable income:</label>
                    <input id="grossIncome" type="number">
                    <button id="calculateButton" class="wbx__tax-calculator__form__button">Calculate Tax</button>
        <?php
                    break;
                endwhile;
                break;
        }
        ?>

    </div>
</div>
