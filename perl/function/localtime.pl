#!/usr/bin/perl
use strict;
use warnings;
use Data::Dumper;

my ($sec, $min, $hour, $day, $mon, $year, $wday) = localtime();
$year += 1900;
$mon++;

print $year."\n";
print $mon."\n";
print $day."\n";
print $hour."\n";
print $min."\n";
print $sec."\n";
