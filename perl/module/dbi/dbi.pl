#!/usr/bin/perl
use strict;
use warnings;
use DBI;

# 接続情報
my $dataSource = 'DBI:mysql:twitter';
my $user = 'twitter_user';
my $password = 'asdfg12345';

# 接続
my $dbh = DBI->connect($dataSource, $user, $password);

# SQL分の準備
my $sth = $dbh->prepare("select * from twitter.tweet");

# SQL文実行
$sth->execute;

# 結果取得
while ( my @row = $sth->fetchrow_array ) {
    print "@row\n";
}

# close
$sth->finish;
$dbh->disconnect;
