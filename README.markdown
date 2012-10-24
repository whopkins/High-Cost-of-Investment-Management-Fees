# Measuring the Impact of Management Fees on Investment Performance

##Useful example of object-oriented programming (OOP)
In a second effort to get a feel for OOP in PHP I decided to again dive into my own application.  This one is a calculator for measuring the impact of overhead management fees on the performance of an investment portfolio.

The goal was to construct the model _properly_ using OOP and a web form, and again I sincerely hope to get some feedback from the Github community on how the code could be improved in order to make it more sensible and ensure that it follows the normal conventions.  I'm not necessarily a perfectionist myself, but it's great to at least be aware of the proper way.

To get acquainted with OOP before writing the NFL QBR script, I watched the [PHP Academy videos on OOP in PHP](http://www.youtube.com/watch?v=hzeh0cDATpA&list=EC5B130A55CD98BA59&feature=plcp).

For anyone trying to get a most basic grip on what's going on, the results from the submitted form are fed into class 'Fees', which is found in a separate PHP file in the 'classes' folder.

Within the class, the variables are established, then I measure four (4) things:
- The results WITHOUT overhead fees of a one-time investment
- The results WITH overhead fees of a one-time investment
- The results WITHOUT overhead fees of a recurring investment
- The results WITH overhead fees of a recurring investment

The original index.php then calls the functions to get the appropriate result.

<div class="impact-result"><?php echo $hero_stats->no_fee_impact(); ?></div>
<div class="impact-result"><?php echo $hero_stats->fee_impact(); ?></div>

###CSS
I went ahead and beautified it with some CSS.  It's nothing special, but for anyone looking to learn basic CSS it may be helpful.

![NFL QBR Screenshot](NFL_QB_Rating/blob/master/images/nfl_qbr_screenshot.png?raw=true "NFL QBR Application with PHP using OOP")

##Origin of the project
I had built a Google spreadsheet for my own purposes to measure the long-term impact of management fees on portfolio performance.  I was pretty amazed at the long-run damage that a seemingly small fee of 1.00% of assets can do to the investment over time.  It's like the evil cousin of the "magic" of compounding interest.