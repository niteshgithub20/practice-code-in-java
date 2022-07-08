import java.util.*;
import java.util.Scanner;
public class FreeCup
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        int cup = sc.nextInt();
        int total = 0;
        total = cup+cup/6;
        System.out.println(cup);
    }
}