#!/usr/bin/perl
use strict;
use warnings;

use Encode;
use Devel::Peek;

my $str = "­¡";
my $decoded = Encode::decode("euc-jp", $str);

print Encode::encode("euc-jp", $decoded);
