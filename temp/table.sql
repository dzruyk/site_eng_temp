/* deprecated
 * FIRST TABLE
 * USER_ID USERNAME PASSWORD(MD5 hashed) email(unique)       score
 * 1       ruyk	    md5(qwe)		 lonely.ruyk@mail.ru 100
 * 2	   nobody   md5(ss)		 nobody@nowhere.no   600
 *
 * Second TABLE
 * category_id questNo(in_category) Points 
 * 1              1                 150 
 * 1		  2		    100
 *
 * thrid table
 * category_id category_name
 * 1            crackme
 * 2		networks
 *
 */

/*
 * FIRST TABLE
 * USER_ID(key) USERNAME PASSWORD(MD5 hashed) email(unique)       score
 * 
 * second table
 * USER_ID completed_quest_id

 */
