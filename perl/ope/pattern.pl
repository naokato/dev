#!/usr/bin/perl

use strict;
use warnings;

if ($#ARGV != 1) {
    print "usage : perl pattern.pl filename condition\n";
    exit();
}

my $file = shift;
my $cond = shift;

open(my $fh, "<", $file) or die "Cannot open $file: $!";

while(<$fh>) {
    if ($_ =~ /$cond.*\[detail: (.*)/){
        $_ =~ /\[detail: (.*)\]/;
        print $1."\n";
    }
}
