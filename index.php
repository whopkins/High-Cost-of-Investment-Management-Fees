<?php
if (isset($_POST['principal'])) $hero_principal = $_POST['principal']; else $hero_principal = null;
if (isset($_POST['repeat'])) $hero_repeat = "checked"; else $hero_repeat = null;
if (isset($_POST['return'])) $hero_return = $_POST['return']; else $hero_return = null;
if (isset($_POST['duration'])) $hero_duration = $_POST['duration']; else $hero_duration = null;
if (isset($_POST['fees'])) $hero_fees = $_POST['fees']; else $hero_fees = null;

require_once 'classes/Fees.php';

$hero_stats = new Fees($hero_principal, $hero_repeat, $hero_return, $hero_duration, $hero_fees);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8'>
		<title>Management Fees and Investments</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
	</head>
	<body>
    <div id="header">
      <h1 class="page-title">Comparing Management Fees with <span class="php-in-title">PHP</span></h1>
    </div>
    <div id="container">
      <div class="panel">
        <h3>Management Fees</h3>
        <p>A management fee is the annual overhead charged on an investment.  Many forms of investing don't carry management fees.  In buying a stock or bond on the open market, there typically is NOT any overheard.  The buyer will often be charged a small, one-time brokerage fee for the transaction (e.g. $7 on Scottrage, for a purchase of say, Wal-Mart stock), but neither Wal-Mart nor Scottrade will charge the buyer for owning the stock.</p>
        <p class="left-text">If an individual or institution is helping to manage the investment portfolio, there will be an overhead management fee.  This fee is nearly always calculated on an annual basis as a percentage of assets, and it can range from as little as less than 0.10% of assests for some ETFs (exchange-traded funds) to 20.00% of assets for many hedge funds.  The overall overhead fee is often referred to as the "expense ratio".  To get a sense, the table on the right has examples using Seeking Alpha data from Oct 2012.</p>
      	<div class="right-table">
          <h5 class="mini-title">Sample Expense Ratios</h5>
          <table class="right-table">
            <tr>
              <td>SPDR S&P 500 Trust ETF (SPY)</td>
              <td class="cell-number">0.09%</td>
            </tr>
            <tr class="even-row">
              <td>Vanguard Total World Stock ETF (VT)</td>
              <td class="cell-number">0.22%</td>
            </tr>
            <tr>
              <td>PIMCO Long-Term Credit Fund (PTCIX)</td>
              <td class="cell-number">0.55%</td>
            </tr>
            <tr class="even-row">
              <td>PNC Small Cap Fund (PPCAX)</td>
              <td class="cell-number">1.53%</td>
            </tr>
            <tr>
              <td>Typical hedge fund</td>
              <td class="cell-number">2.00%</td>
            </tr>
          </table>
      	</div>
      	<div class="clear"></div>
      </div>
      <div class="panel">
        <h3>Why Do They Matter?</h3>
        <p>Why do we care about management fees?  0.09% is miniscule, and even 2.00% doesn't sound like much.  As it turns out, the overhead fees add up in a big way over time.  Some refer to the "magic" of compounding interest rates.  Well, this is the opposite - call it the "horror" of annual investment fees.  At a basic level, say and investor hopes for a conservative 5% annual return on his investment.  a seemingly harmless expense ratio of 0.50% will actually consume 10% of his profits.  a 2.00% expense ratio will eat away 40% of his profits!  In a bad year, where his assets only appreciate, say, 1.00%, that 2.00% expense ratio will actually cause his to <i>lose</i> 1.00% - and that's before considering the effects of taxes and inflation.  Then next year his investments will begin from a lower base, and he will be hit with the overhead fees again, and so on year after year.</p>
        <p>To see the grim reality firsthand, below is a calculator for measuring the effects of overhead fees on investments.  Input the principal amount invested, the expected returns, the duration of the investment, and the expense ratio.  The calculator will output two amounts: (1) the end of period balance without any overhead and (2) the end of period balance after the management fees.  For example, you might try a repeating $5,000 principal, .05 IRR (5.00%), .005 expense ratio (0.50%), and a 40-year duration.</p>
      </div>
      <div class="panel">
      	<h3>Impact Calculator</h3>
        <form id="impact-form" method="post" action="index.php#impact-form">
          <div class="impact-form-inputs">
            <label class="large-label">Principal:</label><input class="text-input" name="principal" autofocus="autofocus" min="0" placeholder="Amount Invested ($)" required="required" value="<?php echo $hero_principal ?>" /><br />
            <div class="checkbox-wrapper"><label class="small-label">Repeated annual contribution?</label><input class="checkbox-input" name="repeat" type="checkbox" <?php echo $hero_repeat ?> /></div><br />
            <div class="clear"></div>
            <label class="large-label">IRR:</label><input class="text-input" name="return" placeholder="Expected Return (%)" required="required" value="<?php echo $hero_return ?>" /><br />
            <label class="large-label">Expense Ratio:</label><input class="text-input" name="fees" id="percent-input" placeholder="Annual Overhead (%)" required="required" value="<?php echo $hero_fees ?>" /><br />
            <label class="large-label">Duration:</label><input class="text-input" name="duration" type="number" min="0" max="50" placeholder="Duration (Years)" required="required" value="<?php echo $hero_duration ?>" /><output for="duration">1</output><br />
          </div>
          <div class="calc-mini-panel">
            <button type="submit">Calculate</button>
            <div class="clear"></div>
            <div class="impact-no-fee-result-wrapper">
            	<h5>No fees</h5>
							<div class="impact-result"><?php echo $hero_stats->no_fee_impact(); ?></div>
            </div>
            <div class="impact-fee-result-wrapper">
            	<h5>Fees</h5>
							<div class="impact-result"><?php echo $hero_stats->fee_impact(); ?></div>
            </div>
          </div>
        </form>
      	<div class="clear"></div>
      </div>
    </div>
	</body>
</html>