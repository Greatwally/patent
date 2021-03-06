<?php 
/*------------------------------------------------------------------------
# com_joomlatag_objects_directory � Jtag objects Directory
# ------------------------------------------------------------------------
# author    Joomlatag.com
# copyright Copyright (C) 2011 Joomlatag. All Rights Reserved.
# Websites  http://www.joomlatag.com
# Support   http://www.joomlatag.com/Forum/
# @version  2.0
# @license  http://www.joomlatag.com/Different-articles/software-license.html
-------------------------------------------------------------------------*/

defined('_JEXEC') or die('Restricted access');

function jtag_countries_list($add_empty = false) {
  if ($add_empty)
  {
    $countries[] = JHTML::_('select.option', '', JText::_('JTAG_SELECT_COUNTRY'));
  }
  $countries[] = JHTML::_('select.option', 'AF', 'Afghanistan');
  $countries[] = JHTML::_('select.option', 'AL', 'Albania');
  $countries[] = JHTML::_('select.option', 'DZ', 'Algeria');
  $countries[] = JHTML::_('select.option', 'AS', 'American Samoa');
  $countries[] = JHTML::_('select.option', 'AD', 'Andorra');
  $countries[] = JHTML::_('select.option', 'AO', 'Angola');
  $countries[] = JHTML::_('select.option', 'AI', 'Anguilla');
  $countries[] = JHTML::_('select.option', 'AQ', 'Antarctica');
  $countries[] = JHTML::_('select.option', 'AG', 'Antigua and Barbuda');
  $countries[] = JHTML::_('select.option', 'AR', 'Argentina');
  $countries[] = JHTML::_('select.option', 'AM', 'Armenia');
  $countries[] = JHTML::_('select.option', 'AW', 'Aruba');
  $countries[] = JHTML::_('select.option', 'AU', 'Australia');
  $countries[] = JHTML::_('select.option', 'AT', 'Austria');
  $countries[] = JHTML::_('select.option', 'AZ', 'Azerbaijan');
  $countries[] = JHTML::_('select.option', 'BS', 'Bahamas');
  $countries[] = JHTML::_('select.option', 'BH', 'Bahrain');
  $countries[] = JHTML::_('select.option', 'BD', 'Bangladesh');
  $countries[] = JHTML::_('select.option', 'BB', 'Barbados');
  $countries[] = JHTML::_('select.option', 'BY', 'Belarus');
  $countries[] = JHTML::_('select.option', 'BE', 'Belgium');
  $countries[] = JHTML::_('select.option', 'BZ', 'Belize');
  $countries[] = JHTML::_('select.option', 'BJ', 'Benin');
  $countries[] = JHTML::_('select.option', 'BM', 'Bermuda');
  $countries[] = JHTML::_('select.option', 'BT', 'Bhutan');
  $countries[] = JHTML::_('select.option', 'BO', 'Bolivia');
  $countries[] = JHTML::_('select.option', 'BA', 'Bosnia and Herzegowina');
  $countries[] = JHTML::_('select.option', 'BW', 'Botswana');
  $countries[] = JHTML::_('select.option', 'BV', 'Bouvet Island');
  $countries[] = JHTML::_('select.option', 'BR', 'Brazil');
  $countries[] = JHTML::_('select.option', 'IO', 'British Indian Ocean Territory');
  $countries[] = JHTML::_('select.option', 'BN', 'Brunei Darussalam');
  $countries[] = JHTML::_('select.option', 'BG', 'Bulgaria');
  $countries[] = JHTML::_('select.option', 'BF', 'Burkina Faso');
  $countries[] = JHTML::_('select.option', 'BI', 'Burundi');
  $countries[] = JHTML::_('select.option', 'KH', 'Cambodia');
  $countries[] = JHTML::_('select.option', 'CM', 'Cameroon');
  $countries[] = JHTML::_('select.option', 'CA', 'Canada');
  $countries[] = JHTML::_('select.option', 'CV', 'Cape Verde');
  $countries[] = JHTML::_('select.option', 'KY', 'Cayman Islands');
  $countries[] = JHTML::_('select.option', 'CF', 'Central African Republic');
  $countries[] = JHTML::_('select.option', 'TD', 'Chad');
  $countries[] = JHTML::_('select.option', 'CL', 'Chile');
  $countries[] = JHTML::_('select.option', 'CN', 'China');
  $countries[] = JHTML::_('select.option', 'CX', 'Christmas Island');
  $countries[] = JHTML::_('select.option', 'CC', 'Cocos (Keeling) Islands');
  $countries[] = JHTML::_('select.option', 'CO', 'Colombia');
  $countries[] = JHTML::_('select.option', 'KM', 'Comoros');
  $countries[] = JHTML::_('select.option', 'CG', 'Congo');
  $countries[] = JHTML::_('select.option', 'CD', 'Congo, the Democratic Republic of the');
  $countries[] = JHTML::_('select.option', 'CK', 'Cook Islands');
  $countries[] = JHTML::_('select.option', 'CR', 'Costa Rica');
  $countries[] = JHTML::_('select.option', 'CI', 'Cote d\'Ivoire');
  $countries[] = JHTML::_('select.option', 'HR', 'Croatia (Hrvatska)');
  $countries[] = JHTML::_('select.option', 'CU', 'Cuba');
  $countries[] = JHTML::_('select.option', 'CY', 'Cyprus');
  $countries[] = JHTML::_('select.option', 'CZ', 'Czech Republic');
  $countries[] = JHTML::_('select.option', 'DK', 'Denmark');
  $countries[] = JHTML::_('select.option', 'DJ', 'Djibouti');
  $countries[] = JHTML::_('select.option', 'DM', 'Dominica');
  $countries[] = JHTML::_('select.option', 'DO', 'Dominican Republic');
  $countries[] = JHTML::_('select.option', 'TP', 'East Timor');
  $countries[] = JHTML::_('select.option', 'EC', 'Ecuador');
  $countries[] = JHTML::_('select.option', 'EG', 'Egypt');
  $countries[] = JHTML::_('select.option', 'SV', 'El Salvador');
  $countries[] = JHTML::_('select.option', 'GQ', 'Equatorial Guinea');
  $countries[] = JHTML::_('select.option', 'ER', 'Eritrea');
  $countries[] = JHTML::_('select.option', 'EE', 'Estonia');
  $countries[] = JHTML::_('select.option', 'ET', 'Ethiopia');
  $countries[] = JHTML::_('select.option', 'FK', 'Falkland Islands (Malvinas)');
  $countries[] = JHTML::_('select.option', 'FO', 'Faroe Islands');
  $countries[] = JHTML::_('select.option', 'FJ', 'Fiji');
  $countries[] = JHTML::_('select.option', 'FI', 'Finland');
  $countries[] = JHTML::_('select.option', 'FR', 'France');
  $countries[] = JHTML::_('select.option', 'FX', 'France, Metropolitan');
  $countries[] = JHTML::_('select.option', 'GF', 'French Guiana');
  $countries[] = JHTML::_('select.option', 'PF', 'French Polynesia');
  $countries[] = JHTML::_('select.option', 'TF', 'French Southern Territories');
  $countries[] = JHTML::_('select.option', 'GA', 'Gabon');
  $countries[] = JHTML::_('select.option', 'GM', 'Gambia');
  $countries[] = JHTML::_('select.option', 'GE', 'Georgia');
  $countries[] = JHTML::_('select.option', 'DE', 'Germany');
  $countries[] = JHTML::_('select.option', 'GH', 'Ghana');
  $countries[] = JHTML::_('select.option', 'GI', 'Gibraltar');
  $countries[] = JHTML::_('select.option', 'GR', 'Greece');
  $countries[] = JHTML::_('select.option', 'GL', 'Greenland');
  $countries[] = JHTML::_('select.option', 'GD', 'Grenada');
  $countries[] = JHTML::_('select.option', 'GP', 'Guadeloupe');
  $countries[] = JHTML::_('select.option', 'GU', 'Guam');
  $countries[] = JHTML::_('select.option', 'GT', 'Guatemala');
  $countries[] = JHTML::_('select.option', 'GN', 'Guinea');
  $countries[] = JHTML::_('select.option', 'GW', 'Guinea-Bissau');
  $countries[] = JHTML::_('select.option', 'GY', 'Guyana');
  $countries[] = JHTML::_('select.option', 'HT', 'Haiti');
  $countries[] = JHTML::_('select.option', 'HM', 'Heard and Mc Donald Islands');
  $countries[] = JHTML::_('select.option', 'VA', 'Holy See (Vatican City State)');
  $countries[] = JHTML::_('select.option', 'HN', 'Honduras');
  $countries[] = JHTML::_('select.option', 'HK', 'Hong Kong');
  $countries[] = JHTML::_('select.option', 'HU', 'Hungary');
  $countries[] = JHTML::_('select.option', 'IS', 'Iceland');
  $countries[] = JHTML::_('select.option', 'IN', 'India');
  $countries[] = JHTML::_('select.option', 'ID', 'Indonesia');
  $countries[] = JHTML::_('select.option', 'IR', 'Iran (Islamic Republic of)');
  $countries[] = JHTML::_('select.option', 'IQ', 'Iraq');
  $countries[] = JHTML::_('select.option', 'IE', 'Ireland');
  $countries[] = JHTML::_('select.option', 'IL', 'Israel');
  $countries[] = JHTML::_('select.option', 'IT', 'Italy');
  $countries[] = JHTML::_('select.option', 'JM', 'Jamaica');
  $countries[] = JHTML::_('select.option', 'JP', 'Japan');
  $countries[] = JHTML::_('select.option', 'JO', 'Jordan');
  $countries[] = JHTML::_('select.option', 'KZ', 'Kazakhstan');
  $countries[] = JHTML::_('select.option', 'KE', 'Kenya');
  $countries[] = JHTML::_('select.option', 'KI', 'Kiribati');
  $countries[] = JHTML::_('select.option', 'KP', 'Korea, Democratic People\'s Republic of');
  $countries[] = JHTML::_('select.option', 'KR', 'Korea, Republic of');
  $countries[] = JHTML::_('select.option', 'KW', 'Kuwait');
  $countries[] = JHTML::_('select.option', 'KG', 'Kyrgyzstan');
  $countries[] = JHTML::_('select.option', 'LA', 'Lao People\'s Democratic Republic');
  $countries[] = JHTML::_('select.option', 'LV', 'Latvia');
  $countries[] = JHTML::_('select.option', 'LB', 'Lebanon');
  $countries[] = JHTML::_('select.option', 'LS', 'Lesotho');
  $countries[] = JHTML::_('select.option', 'LR', 'Liberia');
  $countries[] = JHTML::_('select.option', 'LY', 'Libyan Arab Jamahiriya');
  $countries[] = JHTML::_('select.option', 'LI', 'Liechtenstein');
  $countries[] = JHTML::_('select.option', 'LT', 'Lithuania');
  $countries[] = JHTML::_('select.option', 'LU', 'Luxembourg');
  $countries[] = JHTML::_('select.option', 'MO', 'Macau');
  $countries[] = JHTML::_('select.option', 'MK', 'Macedonia, The Former Yugoslav Republic of');
  $countries[] = JHTML::_('select.option', 'MG', 'Madagascar');
  $countries[] = JHTML::_('select.option', 'MW', 'Malawi');
  $countries[] = JHTML::_('select.option', 'MY', 'Malaysia');
  $countries[] = JHTML::_('select.option', 'MV', 'Maldives');
  $countries[] = JHTML::_('select.option', 'ML', 'Mali');
  $countries[] = JHTML::_('select.option', 'MT', 'Malta');
  $countries[] = JHTML::_('select.option', 'MH', 'Marshall Islands');
  $countries[] = JHTML::_('select.option', 'MQ', 'Martinique');
  $countries[] = JHTML::_('select.option', 'MR', 'Mauritania');
  $countries[] = JHTML::_('select.option', 'MU', 'Mauritius');
  $countries[] = JHTML::_('select.option', 'YT', 'Mayotte');
  $countries[] = JHTML::_('select.option', 'MX', 'Mexico');
  $countries[] = JHTML::_('select.option', 'FM', 'Micronesia, Federated States of');
  $countries[] = JHTML::_('select.option', 'MD', 'Moldova, Republic of');
  $countries[] = JHTML::_('select.option', 'MC', 'Monaco');
  $countries[] = JHTML::_('select.option', 'MN', 'Mongolia');
  $countries[] = JHTML::_('select.option', 'MS', 'Montserrat');
  $countries[] = JHTML::_('select.option', 'MA', 'Morocco');
  $countries[] = JHTML::_('select.option', 'MZ', 'Mozambique');
  $countries[] = JHTML::_('select.option', 'MM', 'Myanmar');
  $countries[] = JHTML::_('select.option', 'NA', 'Namibia');
  $countries[] = JHTML::_('select.option', 'NR', 'Nauru');
  $countries[] = JHTML::_('select.option', 'NP', 'Nepal');
  $countries[] = JHTML::_('select.option', 'NL', 'Netherlands');
  $countries[] = JHTML::_('select.option', 'AN', 'Netherlands Antilles');
  $countries[] = JHTML::_('select.option', 'NC', 'New Caledonia');
  $countries[] = JHTML::_('select.option', 'NZ', 'New Zealand');
  $countries[] = JHTML::_('select.option', 'NI', 'Nicaragua');
  $countries[] = JHTML::_('select.option', 'NE', 'Niger');
  $countries[] = JHTML::_('select.option', 'NG', 'Nigeria');
  $countries[] = JHTML::_('select.option', 'NU', 'Niue');
  $countries[] = JHTML::_('select.option', 'NF', 'Norfolk Island');
  $countries[] = JHTML::_('select.option', 'MP', 'Northern Mariana Islands');
  $countries[] = JHTML::_('select.option', 'NO', 'Norway');
  $countries[] = JHTML::_('select.option', 'OM', 'Oman');
  $countries[] = JHTML::_('select.option', 'PK', 'Pakistan');
  $countries[] = JHTML::_('select.option', 'PW', 'Palau');
  $countries[] = JHTML::_('select.option', 'PA', 'Panama');
  $countries[] = JHTML::_('select.option', 'PG', 'Papua New Guinea');
  $countries[] = JHTML::_('select.option', 'PY', 'Paraguay');
  $countries[] = JHTML::_('select.option', 'PE', 'Peru');
  $countries[] = JHTML::_('select.option', 'PH', 'Philippines');
  $countries[] = JHTML::_('select.option', 'PN', 'Pitcairn');
  $countries[] = JHTML::_('select.option', 'PL', 'Poland');
  $countries[] = JHTML::_('select.option', 'PT', 'Portugal');
  $countries[] = JHTML::_('select.option', 'PR', 'Puerto Rico');
  $countries[] = JHTML::_('select.option', 'QA', 'Qatar');
  $countries[] = JHTML::_('select.option', 'RE', 'Reunion');
  $countries[] = JHTML::_('select.option', 'RO', 'Romania');
  $countries[] = JHTML::_('select.option', 'RU', 'Russian Federation');
  $countries[] = JHTML::_('select.option', 'RW', 'Rwanda');
  $countries[] = JHTML::_('select.option', 'KN', 'Saint Kitts and Nevis');
  $countries[] = JHTML::_('select.option', 'LC', 'Saint LUCIA');
  $countries[] = JHTML::_('select.option', 'VC', 'Saint Vincent and the Grenadines');
  $countries[] = JHTML::_('select.option', 'WS', 'Samoa');
  $countries[] = JHTML::_('select.option', 'SM', 'San Marino');
  $countries[] = JHTML::_('select.option', 'ST', 'Sao Tome and Principe');
  $countries[] = JHTML::_('select.option', 'SA', 'Saudi Arabia');
  $countries[] = JHTML::_('select.option', 'SN', 'Senegal');
  $countries[] = JHTML::_('select.option', 'SC', 'Seychelles');
  $countries[] = JHTML::_('select.option', 'SL', 'Sierra Leone');
  $countries[] = JHTML::_('select.option', 'SG', 'Singapore');
  $countries[] = JHTML::_('select.option', 'SK', 'Slovakia (Slovak Republic)');
  $countries[] = JHTML::_('select.option', 'SI', 'Slovenia');
  $countries[] = JHTML::_('select.option', 'SB', 'Solomon Islands');
  $countries[] = JHTML::_('select.option', 'SO', 'Somalia');
  $countries[] = JHTML::_('select.option', 'ZA', 'South Africa');
  $countries[] = JHTML::_('select.option', 'GS', 'South Georgia and the South Sandwich Islands');
  $countries[] = JHTML::_('select.option', 'ES', 'Spain');
  $countries[] = JHTML::_('select.option', 'LK', 'Sri Lanka');
  $countries[] = JHTML::_('select.option', 'SH', 'St. Helena');
  $countries[] = JHTML::_('select.option', 'PM', 'St. Pierre and Miquelon');
  $countries[] = JHTML::_('select.option', 'SD', 'Sudan');
  $countries[] = JHTML::_('select.option', 'SR', 'Suriname');
  $countries[] = JHTML::_('select.option', 'SJ', 'Svalbard and Jan Mayen Islands');
  $countries[] = JHTML::_('select.option', 'SZ', 'Swaziland');
  $countries[] = JHTML::_('select.option', 'SE', 'Sweden');
  $countries[] = JHTML::_('select.option', 'CH', 'Switzerland');
  $countries[] = JHTML::_('select.option', 'SY', 'Syrian Arab Republic');
  $countries[] = JHTML::_('select.option', 'TW', 'Taiwan, Province of China');
  $countries[] = JHTML::_('select.option', 'TJ', 'Tajikistan');
  $countries[] = JHTML::_('select.option', 'TZ', 'Tanzania, United Republic of');
  $countries[] = JHTML::_('select.option', 'TH', 'Thailand');
  $countries[] = JHTML::_('select.option', 'TG', 'Togo');
  $countries[] = JHTML::_('select.option', 'TK', 'Tokelau');
  $countries[] = JHTML::_('select.option', 'TO', 'Tonga');
  $countries[] = JHTML::_('select.option', 'TT', 'Trinidad and Tobago');
  $countries[] = JHTML::_('select.option', 'TN', 'Tunisia');
  $countries[] = JHTML::_('select.option', 'TR', 'Turkey');
  $countries[] = JHTML::_('select.option', 'TM', 'Turkmenistan');
  $countries[] = JHTML::_('select.option', 'TC', 'Turks and Caicos Islands');
  $countries[] = JHTML::_('select.option', 'TV', 'Tuvalu');
  $countries[] = JHTML::_('select.option', 'UG', 'Uganda');
  $countries[] = JHTML::_('select.option', 'UA', 'Ukraine');
  $countries[] = JHTML::_('select.option', 'AE', 'United Arab Emirates');
  $countries[] = JHTML::_('select.option', 'GB', 'United Kingdom');
  $countries[] = JHTML::_('select.option', 'US', 'United States');
  $countries[] = JHTML::_('select.option', 'UM', 'United States Minor Outlying Islands');
  $countries[] = JHTML::_('select.option', 'UY', 'Uruguay');
  $countries[] = JHTML::_('select.option', 'UZ', 'Uzbekistan');
  $countries[] = JHTML::_('select.option', 'VU', 'Vanuatu');
  $countries[] = JHTML::_('select.option', 'VE', 'Venezuela');
  $countries[] = JHTML::_('select.option', 'VN', 'Viet Nam');
  $countries[] = JHTML::_('select.option', 'VG', 'Virgin Islands (British)');
  $countries[] = JHTML::_('select.option', 'VI', 'Virgin Islands (U.S.)');
  $countries[] = JHTML::_('select.option', 'WF', 'Wallis and Futuna Islands');
  $countries[] = JHTML::_('select.option', 'EH', 'Western Sahara');
  $countries[] = JHTML::_('select.option', 'YE', 'Yemen');
  $countries[] = JHTML::_('select.option', 'YU', 'Yugoslavia');
  $countries[] = JHTML::_('select.option', 'ZM', 'Zambia');
  $countries[] = JHTML::_('select.option', 'ZW', 'Zimbabwe');

  return $countries;
}
