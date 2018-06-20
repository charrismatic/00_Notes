https://en.bitcoin.it/wiki/Comparison_of_mining_pools

# Comparison of mining pools


CPPSRB - Capped Pay Per Share with Recent Backpay. [1]
DGM - Double Geometric Method. A hybrid between PPLNS and Geometric reward types that enables to operator to absorb some of the variance risk. Operator receives portion of payout on short rounds and returns it on longer rounds to normalize payments. [2]
ESMPPS - Equalized Shared Maximum Pay Per Share. Like SMPPS, but equalizes payments fairly among all those who are owed. [3]
POT - Pay On Target. A high variance PPS variant that pays on the difficulty of work returned to pool rather than the difficulty of work served by pool [4]
PPLNS - Pay Per Last N Shares. Similar to proportional, but instead of looking at the number of shares in the round, instead looks at the last N shares, regardless of round boundaries.
PPLNSG - Pay Per Last N Groups (or shifts). Similar to PPLNS, but shares are grouped into "shifts" which are paid as a whole.
PPS - Pay Per Share. Each submitted share is worth certain amoutripnt of BC. Since finding a block requires <current difficulty> shares on average, a PPS method with 0% fee would be 12.5 BTC divided by <current difficulty>. It is risky for pool operators, hence the fee is highest.
Prop. - Proportional. When block is found, the reward is distributed among all workers proportionally to how much shares each of them has found.
RSMPPS - Recent Shared Maximum Pay Per Share. Like SMPPS, but system aims to prioritize the most recent miners first. [5]
Score - Score based system: a proportional reward, but weighed by time submitted. Each submitted share is worth more in the function of time t since start of current round. For each share score is updated by: score += exp(t/C). This makes later shares worth much more than earlier shares, thus the miner's score quickly diminishes when they stop mining on the pool. Rewards are calculated proportionally to scores (and not to shares). (at slush's pool C=300 seconds, and every hour scores are normalized)
SMPPS - Shared Maximum Pay Per Share. Like Pay Per Share, but never pays more than the pool earns. [6]
FPPS - Full Pay Per Share. Similar to PPS，but not only divide regular block reward (12.5 BTC for now) but also some of the transaction fees. Calculate a standard transaction fee within a certain period and distribute it to miners according to their hash power contributions in the pool. It will increase the miners' earnings by sharing some of the transaction fees.
A statistically valid analysis of some pools and their payout methods: Bitcoin network and pool analysis
