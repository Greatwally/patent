<?php 
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory – Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

?>

<table class="adminform">
  <tbody>
    <tr>
      <td width="50%" valign="top">
        <div class="jtag_dashboard_box jtag_dashboard_news">
          <h2>Latest news</h2>
          <h3>Joomlatag and Joomla Dancer has merged</h3>
          <p class="meta">Sunday, 21 August 2011 20:14</p>
          <p>
            As September 9th 2011 Joomlatag.com and Joomladancer.com has merged. Joomlatag.com has undergone a major redesign while adding a suite of new and exciting products like Jtag calendar, Jtag magazine and our new mini shopping cart Jtag Minicart.  Our goal at Joomla Tag is to provide great Joomla extensions and templates both free and paid augmented by a fanatical customer service. 
          </p>
          <p>
            Thanks for you continued support as we develop the next generation of Joomla extensions and templates.
          </p>
          <div class="footer">
            <a href="http://www.joomlatag.com/index.php?option=com_k2&view=itemlist&layout=category&task=category&id=15&Itemid=25" target="_blank">Read more news on JoomlaTag.com</a>
          </div>
        </div>
      </td>
      <td width="50%" valign="top">
        <div class="jtag_dashboard_box">
          <h2>
            Twitter
            <a href="http://twitter.com/joomladancer" class="twitter-follow-button" data-show-count="false">Follow</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
          </h2>
          <?php foreach($this->feed as $entry): ?>
            <p class="twitter">
              <span class="author"><?php echo $entry->author->name; ?>:</span>
              <?php echo $entry->title; ?>
              <p class="meta"><?php echo date('Y-m-d H:i', strtotime($entry->updated)); ?></p>
            </p>
          <?php endforeach; ?>
          <div class="footer">
            <a href="http://www.twitter.com">Read more from Twitter</a>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td width="50%" valign="top">
        <div class="jtag_dashboard_box">
          <h2>Updates</h2>
<!--          <div class="notice">
            <span>Version 2.0.1 available.</span>
            <a href="#" class="update">Download</a>
          </div>-->
          <h3>Changelog</h3>
          <p>
            <?php echo $this->changelog; ?>
          </p>
        </div>
      </td>
      <td width="50%" valign="top">
        <div class="jtag_dashboard_box">
          <h2>About us</h2>
          <p>
            Since 2009, Joomla Tag has been developing quality Joomla extensions. We have hundreds of satisfy customers worldwide that use our extensions everyday on their Joomla websites.2011 will mark a substantive milestone in which we are redeveloping our components, our brand as well as adding a whole new suite of products.
          </p>
          <p>Our goal is to:</p>
          <ol style="padding-left: 30px;">
            <li><span style="white-space: pre;"> </span>become the preeminent marketplace for quality Joomla extensions, plugins and templates;</li>
            <li><span style="white-space: pre;"> </span>develop some of the must exciting, intuitive and well coded Joomla apps on the market;</li>
            <li><span style="white-space: pre;"> </span>provide users with exceptional customer service, documentation and Joomla tutorials.</li>
          </ol>
          <p>
            To redefine our market we need your feedback to support, build and expedite Joomla applications that meet or exceed your current and future expectations.
          </p>
          <p>
            <a href="http://extensions.joomla.org/extensions/owner/Securelogy" target="_blank" class="vote">Vote for us on JED</a>
          </p>
        </div>
      </td>
    </tr>
  </tbody>
</table>