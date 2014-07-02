#!/usr/bin/perl
use strict;
use warnings;
use XML::DOM;

my $xml = <<'EOF';
<?xml version="1.0" encoding="utf-8"?>
<allinfo>
    <data>
        <namel>髙﨑</namel>
        <namef>太郎～①</namef>
        <soubi>
            <buki>douno tsurugi</buki>
            <bougu>kawano huku</bougu>
        </soubi>
    </data>
    <data>
        <namel>佐藤</namel>
        <namef>二郎</namef>
        <soubi>
            <buki>kino bou</buki>
            <bougu>onabeno huta</bougu>
        </soubi>
    </data>
</allinfo>
EOF

my $parser = new XML::DOM::Parser;
my $doc = $parser->parse($xml);
#print $doc->toString;

my $node = $doc->getElementsByTagName("buki")->item(1);
print $node->toString;
