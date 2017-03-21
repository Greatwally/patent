<?php
/*------------------------------------------------------------------------
# com_joomlatag_members_directory ? Jtag Members Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

//print_r($this->profile->phone_no);exit;

?>
BEGIN:VCARD
VERSION:3.0
N:<?php echo $this->profile->name."\n";?>
FN: <?php echo  $this->profile->name."\n";?>
TITLE:<?php echo  $this->profile->name."\n";?>
TEL;TYPE=WORK,VOICE:<?php echo $this->profile->phone_no."\n";?>
TEL;TYPE=WORK,FAX:<?php echo $this->profile->fax."\n";?>
TEL;TYPE=WORK,MOBILE:<?php echo $this->profile->phone_no."\n";?>
ADR;TYPE=WORK: <?php echo $this->profile->city.", ".$this->countries[$this->profile->country].", ".$this->profile->state."\n";?>
LABEL;TYPE=WORK:<?php echo $this->profile->city.", ".$this->countries[$this->profile->country].", ".$this->profile->state."\n";?>
EMAIL;TYPE=PREF,INTERNET:<?php echo $this->profile->email."\n";?>
URL:<?php echo $this->profile->webpage."\n";?>
REV:<?php echo $rev; ?> Z
END:VCARD



