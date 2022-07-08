import java.util.*;
import java.util.Scanner;

public class Prime
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int count;
        count = sc.nextInt();
        printFibonacciSeries(count);
    }

public static void printFibonacciSeries(int count) {
	int a = 0;
	int b = 1;
	int c = 1;
	for (int i = 1; i <= count; i++) {
		System.out.print(a + ", ");
		a = b;
		b = c;
		c = a + b;
	}
}
}